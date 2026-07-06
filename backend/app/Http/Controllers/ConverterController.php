<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConversionHistory;

class ConverterController extends Controller
{
    public function index()
    {
        return view('converter.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'conversion_type' => 'required'
        ]);

        $file = $request->file('file');
        $originalFilename = $file->getClientOriginalName();
        $size = $file->getSize() / 1024; // KB

        // Create dummy entry
        $history = ConversionHistory::create([
            'original_filename' => $originalFilename,
            'type_conversion' => $request->conversion_type,
            'file_size_kb' => (int)$size,
            'status' => 'ai_processing',
            'ai_summary' => 'Menunggu proses AI...',
            'converted_filename' => 'converted_' . $originalFilename . '.pdf'
        ]);

        return redirect()->route('converter.processing', ['id' => $history->id]);
    }

    public function processing($id)
    {
        $history = ConversionHistory::findOrFail($id);
        return view('converter.processing', compact('history'));
    }

    public function process_complete($id)
    {
        $history = ConversionHistory::findOrFail($id);
        
        $ext = explode('_', $history->type_conversion)[0]; // e.g. "word", "pdf", "excel"
        $summary = "AI berhasil membaca struktur dokumen:\n- ";
        
        if ($ext === 'word' || $ext === 'pdf') {
            $summary .= "3 Heading Terdeteksi\n- 5 Paragraf dianalisis\n- 1 Tabel Diperbaiki\n- Ukuran font disesuaikan untuk menghindari pergeseran margin.";
        } elseif ($ext === 'excel') {
            $summary .= "4 Sheet Terdeteksi\n- Layout Grid dipertahankan\n- Cell border disesuaikan.";
        } else {
            $summary .= "Elemen presentasi dipertahankan\n- Gambar & shape diekstraksi tanpa pecah.";
        }
        
        $history->update([
            'status' => 'success',
            'ai_summary' => $summary
        ]);
        return redirect()->route('converter.preview', ['id' => $history->id])
                         ->with('success', 'File berhasil diproses oleh AI dan siap diunduh.');
    }

    public function preview($id)
    {
        $history = ConversionHistory::findOrFail($id);
        return view('converter.preview', compact('history'));
    }

    public function history()
    {
        $histories = ConversionHistory::orderBy('created_at', 'desc')->get();
        return view('converter.history', compact('histories'));
    }
}
