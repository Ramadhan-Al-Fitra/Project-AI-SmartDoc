import sys
import os

def convert(input_path, output_path, conversion_type):
    input_path = os.path.abspath(input_path)
    output_path = os.path.abspath(output_path)
    
    if not os.path.exists(input_path):
        raise FileNotFoundError(f"Input file not found: {input_path}")
        
    print(f"Converting {input_path} to {output_path} via {conversion_type}")

    if conversion_type == 'word_to_pdf':
        try:
            from docx2pdf import convert as convert_word
            convert_word(input_path, output_path)
        except Exception as e:
            print("docx2pdf failed, trying win32com directly...")
            import win32com.client
            import pythoncom
            pythoncom.CoInitialize()
            word = win32com.client.Dispatch("Word.Application")
            word.Visible = False
            try:
                doc = word.Documents.Open(input_path)
                doc.SaveAs(output_path, FileFormat=17) # 17 is wdFormatPDF
            finally:
                doc.Close(False)
                word.Quit()
                pythoncom.CoUninitialize()
                
    elif conversion_type == 'pdf_to_word':
        from pdf2docx import Converter
        cv = Converter(input_path)
        cv.convert(output_path)
        cv.close()
        
    elif conversion_type == 'excel_to_pdf':
        import win32com.client
        import pythoncom
        pythoncom.CoInitialize()
        excel = win32com.client.Dispatch("Excel.Application")
        excel.Visible = False
        excel.DisplayAlerts = False
        try:
            wb = excel.Workbooks.Open(input_path)
            # 0 is the format code for xlTypePDF
            wb.ExportAsFixedFormat(0, output_path)
        finally:
            wb.Close(False)
            excel.Quit()
            pythoncom.CoUninitialize()
            
    elif conversion_type == 'powerpoint_to_pdf':
        import win32com.client
        import pythoncom
        pythoncom.CoInitialize()
        powerpoint = win32com.client.Dispatch("Powerpoint.Application")
        try:
            # 32 is the format code for ppSaveAsPDF
            presentation = powerpoint.Presentations.Open(input_path, WithWindow=False)
            presentation.SaveAs(output_path, 32)
        finally:
            presentation.Close()
            powerpoint.Quit()
            pythoncom.CoUninitialize()
            
    else:
        raise ValueError(f"Unsupported conversion type: {conversion_type}")

if __name__ == "__main__":
    if len(sys.argv) < 4:
        print("Usage: python real_converter.py <input_path> <output_path> <conversion_type>")
        sys.exit(1)
        
    input_path = sys.argv[1]
    output_path = sys.argv[2]
    conversion_type = sys.argv[3]
    
    try:
        convert(input_path, output_path, conversion_type)
        print(f"SUCCESS: {output_path}")
        sys.exit(0)
    except Exception as e:
        import traceback
        print(f"ERROR: {str(e)}")
        traceback.print_exc()
        sys.exit(1)
