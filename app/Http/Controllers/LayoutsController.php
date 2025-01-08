<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LayoutsController extends Controller
{
    public array $topics;

    public function certificate($id, $user_id,$name)
    {
        $outputFile = $id ."-".$user_id. ".png";
        $outputPath = public_path('certificate-x/' . $outputFile);
        $url = public_path('certificate-x/' . $outputFile);
        $qrImagePath = public_path('qr_code.png');

        if (!file_exists($outputPath)) {
            QrCode::format('png')->size(200)->style('round')->generate($url, $qrImagePath);

            $imagePath = 'certificate.jpg';
            $image = imagecreatefromjpeg($imagePath);
            $white = imagecolorallocate($image, 20, 20, 40);
            $orange = imagecolorallocate($image, 52, 43, 70);

            $fontPath = public_path('fonts/AlexBrush-Regular.ttf');
            $text = $name;
            $fontSize = 70;

            $imageWidth = imagesx($image);
            $imageHeight = imagesy($image);

            $textBox = imagettfbbox($fontSize, 0, $fontPath, $text);
            $textWidth = $textBox[2] - $textBox[0];
            $textHeight = $textBox[7] - $textBox[1];

            $x = ($imageWidth / 2) - ($textWidth / 2);
            $y = ($imageHeight / 2) + ($textHeight / 2);

            imagettftext($image, $fontSize, 0, $x, $y, $orange, $fontPath, $text);
            imagettftext($image, $fontSize, 0, $x - 2, $y - 2, $white, $fontPath, $text);

            $qrImage = imagecreatefrompng($qrImagePath);
            $qrImageWidth = imagesx($qrImage);
            $qrImageHeight = imagesy($qrImage);

            $qrX = $imageWidth - $qrImageWidth - 30;
            $qrY = $imageHeight - $qrImageHeight - 30;

            imagecopy($image, $qrImage, $qrX, $qrY, 0, 0, $qrImageWidth, $qrImageHeight);

            imagejpeg($image, $outputPath);

            unlink($qrImagePath);

            imagedestroy($image);
            imagedestroy($qrImage);
        }

        return response()->file($outputPath);
    }


    public function __construct()
    {
        $this->topics = array(
            [
                "id" => 1,
                "title" => "Theme 1. Introduction to research writing.",
                "url" => "/topic/1",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/1-theme.docx",
                "video" => "/topic/1/video",
                "video_url" => "1-video.mp3",
                "self_study" => "/topic/1/self-study"
            ],
            [
                "id" => 2,
                "title" => "Theme 2. The steps in the process of research.",
                "url" => "/topic/2",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/2-theme.docx",
                "video" => "/topic/2/video",
                "video_url" => "2-video.mp3",
                "self_study" => "/topic/2/self-study"
            ],
            [
                "id" => 3,
                "title" => "Theme 3. Methods for composing a Literature Review.",
                "url" => "/topic/3",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/3-theme.docx",
                "video" => "/topic/3/video",
                "video_url" => "3-video.mp3",
                "self_study" => "/topic/3/self-study"
            ],
            [
                "id" => 4,
                "title" => "Theme 4. Scientific literature analysis. Writing scientific articles.",
                "url" => "/topic/4",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/4-theme.docx",
                "video" => "/topic/4/video",
                "video_url" => "4-video.mp3",
                "self_study" => "/topic/4/self-study"
            ],
            [
                "id" => 5,
                "title" => "Theme 5. Writing an Introduction. Qualities of a Good Abstract.",
                "url" => "/topic/5",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/5-theme.docx",
                "video" => "/topic/5/video",
                "video_url" => "5-video.mp3",
                "self_study" => "/topic/5/self-study"
            ],
            [
                "id" => 6,
                "title" => "Theme 6. Presentation of data in various graphical and tabular forms.",
                "url" => "/topic/6",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/6-theme.docx",
                "video" => "/topic/6/video",
                "video_url" => "6-video.mp3",
                "self_study" => "/topic/6/self-study"
            ],
            [
                "id" => 7,
                "title" => "Theme 7. Writing annotation for research paper.",
                "url" => "/topic/7",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/7-theme.docx",
                "video" => "/topic/7/video",
                "video_url" => "7-video.mp3",
                "self_study" => "/topic/7/self-study"
            ],
            [
                "id" => 8,
                "title" => "Theme 8. Methods of avoiding plagiarism. Copyright and plagiarism.",
                "url" => "/topic/8",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/8-theme.docx",
                "video" => "/topic/8/video",
                "video_url" => "8-video.mp3",
                "self_study" => "/topic/8/self-study"
            ],
            [
                "id" => 9,
                "title" => "Theme 9. The aims of the research paper. Techniques for examining organization.",
                "url" => "/topic/9",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/9-theme.docx",
                "video" => "/topic/9/video",
                "video_url" => "9-video.mp3",
                "self_study" => "/topic/9/self-study"
            ],
            [
                "id" => 10,
                "title" => "Theme 10. The results of a scientific paper. Tasks of Literature review.",
                "url" => "/topic/10",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/10-theme.docx",
                "video" => "/topic/10/video",
                "video_url" => "10-video.mp3",
                "self_study" => "/topic/10/self-study"
            ],
            [
                "id" => 11,
                "title" => "Theme 11. Writing the conclusion. Practical approach to writing conclusion.",
                "url" => "/topic/11",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/11-theme.docx",
                "video" => "/topic/11/video",
                "video_url" => "11-video.mp3",
                "self_study" => "/topic/11/self-study"
            ],
            [
                "id" => 12,
                "title" => "Theme 12. Research ethics and responsible conduct.",
                "url" => "/topic/12",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/12-theme.docx",
                "video" => "/topic/12/video",
                "video_url" => "12-video.mp3",
                "self_study" => "/topic/12/self-study"
            ],
            [
                "id" => 13,
                "title" => "Theme 13. Qualitative, quantitative, and mixed methods research.",
                "url" => "/topic/13",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/13-theme.docx",
                "video" => "/topic/13/video",
                "video_url" => "13-video.mp3",
                "self_study" => "/topic/13/self-study"
            ],
            [
                "id" => 14,
                "title" => "Theme 14. Quality criteria and other research issues.",
                "url" => "/topic/14",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/14-theme.docx",
                "video" => "/topic/14/video",
                "video_url" => "14-video.mp3",
                "self_study" => "/topic/14/self-study"
            ],
            [
                "id" => 15,
                "title" => "Theme 15. Longitudinal versus cross-sectional research.",
                "url" => "/topic/15",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/15-theme.docx",
                "video" => "/topic/15/video",
                "video_url" => "15-video.mp3",
                "self_study" => "/topic/15/self-study"
            ],
            [
                "id" => 16,
                "title" => "Theme 16. Quantitative data collection.",
                "url" => "/topic/16",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/16-theme.docx",
                "video" => "/topic/16/video",
                "video_url" => "16-video.mp3",
                "self_study" => "/topic/16/self-study"
            ],
            [
                "id" => 17,
                "title" => "Theme 17. Qualitative data collection.",
                "url" => "/topic/17",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/17-theme.docx",
                "video" => "/topic/17/video",
                "video_url" => "17-video.mp3",
                "self_study" => "/topic/17/self-study"
            ],
            [
                "id" => 18,
                "title" => "Theme 18. Mixed methods research: purpose and design.",
                "url" => "/topic/18",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/18-theme.docx",
                "video" => "/topic/18/video",
                "video_url" => "18-video.mp3",
                "self_study" => "/topic/18/self-study"
            ],
            [
                "id" => 19,
                "title" => "Theme 19. Data analysis in qualitative, quantitative, mixed methods research.",
                "url" => "/topic/19",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/19-theme.docx",
                "video" => "/topic/19/video",
                "video_url" => "19-video.mp3",
                "self_study" => "/topic/19/self-study"
            ],
            [
                "id" => 20,
                "title" => "Theme 20. Reporting research results and summing up.",
                "url" => "/topic/20",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/20-theme.docx",
                "video" => "/topic/20/video",
                "video_url" => "20-video.mp3",
                "self_study" => "/topic/20/self-study"
            ],
        );
    }

    public function welcome()
    {
        $users = User::all();

        $quizResults = QuizResult::where('user_id', auth()->id())
            ->select('quiz_id', DB::raw('MAX(score) as score'))
            ->groupBy('quiz_id')
            ->with('quiz')->get();

        $results = QuizResult::where('user_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('welcome', compact('users', 'quizResults', 'results'));
    }

    public function topics()
    {
        $topics = $this->topics;
        return view('pages.topics', compact('topics'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function settings()
    {
        return view('pages.settings');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('pages.profile', compact('user'));
    }

    public function topicDetails($id)
    {
        $topic = array();
        foreach ($this->topics as $x) {
            if ($x['id'] == $id) {
                $topic = $x;
                break;
            }
        }
        return view('topic.details', compact('topic'));
    }

    public function topicAbout($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $filename = asset("theme/" . $id . "-theme.docx");
        return view('topic.about', compact('filename'));
    }

    public function study()
    {
        return view('pages.study');
    }

    public function studyFind($id)
    {
        return view('study.show');
    }

    public function linkArticles(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.links');
    }

    public function glossary(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $filename = asset('glossary.docx');
        return view('pages.glossary', compact('filename'));
    }

    public function topicAudio($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('topic.audio', compact('id'));
    }

    public function topicTest($id)
    {
        $topic = Subject::find($id);
        return view('topic.test.all', compact('topic'));
    }

    public function testSubmit(int $id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if ($id >= 1 and $id <= 20) {
            $topic = Subject::find($id);

            if ($id != 1) {
                $topic = QuizResult::where('quiz_id', $id - 1)
                    ->max('score');

                if (intval($topic) > 80) {
                    return view('topic.test.submit', compact('topic'));
                } else {
                    $id = $id - 1;
                    $error = "Test natijasi 80% dan yuqori to'plansagina keyingi bosqichdagi testni yechish imkoniyati boladi.";
                    return view('topic.test.not', compact('error', 'id'));
                }
            }
            return view('topic.test.submit', compact('topic'));
        } else {
            return view('topic.test.notfound');
        }
    }
}
