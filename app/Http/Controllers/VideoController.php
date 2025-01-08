<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class VideoController extends Controller
{
    public function playAudioWithLyrics($filename): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $audioPath = public_path("video/{$filename}");
        $lyricsPath = public_path("lyrics/{$filename}.txt");

        if (!file_exists($audioPath)) {
            abort(404, 'Audio not found');
        }

        $lyrics = [];

        if (file_exists($lyricsPath)) {
            $lines = file($lyricsPath, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                preg_match('/\[(\d{2}):(\d{2})\](.*)/', $line, $matches);
                if ($matches) {
                    $time = ((int)$matches[1] * 60) + (int)$matches[2];
                    $lyrics[] = [
                        'time' => $time,
                        'text' => trim($matches[3]),
                    ];
                }
            }
        }

        return view('audio-player', [
            'filename' => $filename,
            'lyrics' => $lyrics,
        ]);
    }

    public function stream(Request $request, $filename)
    {
        $filePath = public_path("video/{$filename}");

        if (!file_exists($filePath)) {
            abort(404);
        }

        $fileSize = filesize($filePath);
        $range = $request->header('Range');
        [$start, $end] = $this->getRange($range, $fileSize);

        $response = new StreamedResponse(function () use ($filePath, $start, $end) {
            $stream = fopen($filePath, 'rb');
            fseek($stream, $start);
            $chunkSize = 8192;
            while (!feof($stream) && ftell($stream) <= $end) {
                echo fread($stream, $chunkSize);
                flush();
            }
            fclose($stream);
        });

        $response->headers->set('Content-Type', mime_content_type($filePath));
        $response->headers->set('Content-Length', $end - $start + 1);
        $response->headers->set('Accept-Ranges', 'bytes');
        $response->headers->set('Content-Range', "bytes {$start}-{$end}/{$fileSize}");
        $response->setStatusCode(206);

        return $response;
    }

    private function getRange($range, $fileSize)
    {
        if (!$range) {
            return [0, $fileSize - 1];
        }

        [$start, $end] = explode('-', str_replace('bytes=', '', $range));
        $start = (int) $start;
        $end = $end === '' ? $fileSize - 1 : (int) $end;

        return [$start, $end];
    }
}
