<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Models\ListeningResult;
use App\Models\MatchingResult;
use App\Models\QuizResult;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LayoutsController extends Controller
{
    public array $topics, $articles;

    public function studyActivity($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $argc = Activitie::find($id);

        $is_listing = str_starts_with($argc->name, 'Activity 4');
        $is_vocabulary = str_starts_with($argc->name, 'Activity 5');

        return view('activity.show', compact('argc', 'is_listing', 'is_vocabulary'));
    }

    public function certificate($id, $user_id, $name): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $outputFile = $id . "-" . $user_id . ".png";
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
        $this->articles = [
            [
                'author' => 'Fogal, G. G.',
                'year' => 2024,
                'title' => 'Expanding the collaborative writing research framework: A longitudinal analysis of how collaborative and independent writers orient to writing spaces.',
                'journal' => 'Journal of Second Language Writing',
                'volume' => 63,
                'article_id' => '101096'
            ],
            [
                'author' => 'Goshu, K. C., & Gebremariam, H. T.',
                'year' => 2024,
                'title' => 'Revisiting writing feedback: Using teacher-student writing conferences to enhance learners’ L2 writing skills.',
                'journal' => 'Ampersand',
                'volume' => 13,
                'article_id' => '100195'
            ],
            [
                'author' => 'Gusenbauer, M., & Gauster, S. P.',
                'year' => 2025,
                'title' => 'How to search for literature in systematic reviews and meta-analyses: A comprehensive step-by-step guide.',
                'journal' => 'Technological Forecasting and Social Change',
                'volume' => 212,
                'article_id' => '123833'
            ],
            [
                'author' => 'Riazi, A. M., Rezvani, R., & Ghanbar, H.',
                'year' => 2023,
                'title' => 'Trustworthiness in L2 writing research: A review and analysis of qualitative articles in the Journal of Second Language Writing.',
                'journal' => 'Research Methods in Applied Linguistics',
                'volume' => 2,
                'issue' => 3,
                'article_id' => '100065'
            ],
            [
                'author' => 'Huemann, M., & Pesämaa, O.',
                'year' => 2022,
                'title' => 'The first impression counts: The essentials of writing a convincing introduction.',
                'journal' => 'International Journal of Project Management',
                'volume' => 49,
                'issue' => 7,
                'pages' => '827-830'
            ],
            [
                'author' => 'Liu, J., Chabot, Y., Troncy, R., Huynh, V. P., Labbé, T., & Monnin, P.',
                'year' => 2023,
                'title' => 'From tabular data to knowledge graphs: A survey of semantic table interpretation tasks and methods.',
                'journal' => 'Journal of Web Semantics',
                'volume' => 76,
                'article_id' => '100761'
            ],
            [
                'author' => 'Eguchi, M., & Kyle, K.',
                'year' => 2024,
                'title' => 'Building custom NLP tools to annotate discourse-functional features for second language writing research: A tutorial.',
                'journal' => 'Research Methods in Applied Linguistics',
                'volume' => 3,
                'issue' => 3,
                'article_id' => '100153'
            ],
            [
                'author' => 'Rode, S. D. M., Pennisi, P. R. C., Beaini, T. L., Curi, J. P., Cardoso, S. V., & Paranhos, L. R.',
                'year' => 2019,
                'title' => 'Authorship, plagiarism, and copyright transfer in the scientific universe.',
                'journal' => 'Clinics',
                'volume' => 74,
                'article_id' => 'e1312'
            ],
            [
                'author' => 'Bhatt, I., & Samanhudi, U.',
                'year' => 2022,
                'title' => 'From academic writing to academics writing: Transitioning towards literacies for research productivity.',
                'journal' => 'International Journal of Educational Research',
                'volume' => 111,
                'article_id' => '101917'
            ],
            [
                'author' => 'Chien, S. C., & Li, W. Y.',
                'year' => 2024,
                'title' => 'Perceptions of supervisors and their doctoral students regarding the problems in writing the doctoral dissertation results section.',
                'journal' => 'English for Specific Purposes',
                'volume' => 76,
                'pages' => '14-27'
            ],
            [
                'author' => 'Deng, L., Cheng, Y., & Gao, X.',
                'year' => 2024,
                'title' => 'Promotional strategies in English and Chinese research article introduction and discussion/conclusion sections: A cross-cultural study.',
                'journal' => 'Journal of English for Academic Purposes',
                'volume' => 68,
                'article_id' => '101344'
            ],
            [
                'author' => 'Sagitova, R., Ramazanova, M., Sharplin, E., Berekeyeva, A., & Parmenter, L.',
                'year' => 2024,
                'title' => 'Understanding human participant research ethics: The perspectives of social scientists in Central Asia.',
                'journal' => 'International Journal of Educational Research',
                'volume' => 124,
                'article_id' => '102303'
            ],
            [
                'author' => 'Wallwey, C., & Kajfez, R. L.',
                'year' => 2023,
                'title' => 'Quantitative research artifacts as qualitative data collection techniques in a mixed methods research study.',
                'journal' => 'Methods in Psychology',
                'volume' => 8,
                'article_id' => '100115'
            ],
            [
                'author' => 'Czernek-Marszałek, K., & McCabe, S.',
                'year' => 2024,
                'title' => 'Sampling in qualitative interview research: criteria, considerations and guidelines for success.',
                'journal' => 'Annals of Tourism Research',
                'volume' => 104,
                'article_id' => '103711'
            ],
            [
                'author' => 'Zheng, Y., Rollano, C., Bagnall, C., Bond, C., Song, J., & Qualter, P.',
                'year' => 2024,
                'title' => 'Loneliness and teacher-student relationships in children and adolescents: Multilevel cross-cultural meta-analyses of cross-sectional and longitudinal studies.',
                'journal' => 'Journal of School Psychology',
                'volume' => 107,
                'article_id' => '101380'
            ],
            [
                'author' => 'Gao, J., Pham, Q. H. P., & Polio, C.',
                'year' => 2023,
                'title' => 'The role of theory in structuring literature reviews in qualitative and quantitative research articles.',
                'journal' => 'Journal of English for Academic Purposes',
                'volume' => 63,
                'article_id' => '101243'
            ],
            [
                'author' => 'Ritter, C., Koralesky, K. E., Saraceni, J., Roche, S., Vaarst, M., & Kelton, D.',
                'year' => 2023,
                'title' => 'Qualitative research in dairy science: A narrative review.',
                'journal' => 'Journal of Dairy Science',
            ],
            [
                'author' => 'Östlund, U., Kidd, L., Wengström, Y., & Rowa-Dewar, N.',
                'year' => 2011,
                'title' => 'Combining qualitative and quantitative research within mixed method research designs: a methodological review.',
                'journal' => 'International journal of nursing studies',
                'volume' => 48,
                'issue' => 3,
                'pages' => '369-383'
            ],
            [
                'author' => 'Boetje, J., van Ginkel, S. O., Smakman, M. H., Barendsen, E., & Versendaal, J.',
                'year' => 2024,
                'title' => 'Information problem solving during a digital authentic task: A thematic analysis of students’ strategies.',
                'journal' => 'Computers in Human Behavior Reports',
                'volume' => 15,
                'article_id' => '100470'
            ],
            [
                'author' => 'Dal Santo, T., Rice, D. B., Amiri, L. S., Tasleem, A., Li, K., Boruff, J. T., ... & Thombs, B. D.',
                'year' => 2023,
                'title' => 'Methods and results of studies on reporting guideline adherence are poorly reported: a meta-research study.',
                'journal' => 'Journal of Clinical Epidemiology',
                'volume' => 159,
                'pages' => '225-234'
            ]
        ];

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

    public function welcome(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();

        $quizResults = QuizResult::where('user_id', auth()->id())
            ->select('quiz_id', DB::raw('MAX(score) as score'))
            ->groupBy('quiz_id')
            ->with('quiz')->get();

        $results = QuizResult::where('user_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->get();

        $matchingResults = MatchingResult::where('user_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->get();

        $listeningResults = ListeningResult::where('user_id', auth()->id())
            ->with('listening')
            ->with('subject')
            ->orderBy('created_at', 'DESC')
            ->get();

        $totalUsers = User::count();

        return view('welcome', compact('users', 'quizResults', 'results', 'matchingResults','listeningResults','totalUsers'));
    }

    public function topics(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $topics = $this->topics;
        return view('pages.topics', compact('topics'));
    }

    public function contact(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.contact');
    }

    public function about(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.about');
    }

    public function settings(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.settings');
    }

    public function profile(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();
        return view('pages.profile', compact('user'));
    }

    public function topicDetails($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $topic = array();
        foreach ($this->topics as $x) {
            if ($x['id'] == $id) {
                $topic = $x;
                break;
            }
        }

        Subject::find($id)->update([
            'is_view' => 1
        ]);

        return view('topic.details', compact('topic'));
    }

    public function topicAbout($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $filename = asset("theme/" . $id . "-theme.docx");
        return view('topic.about', compact('filename'));
    }

    public function study(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.study');
    }

    public function studyFind($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $article = $this->articles[$id - 1] ?? null;

        $study = Activitie::where('subject_id', $id)
            ->get();

        $subject = Subject::find($id);

        if ($subject->is_view) {
            return view('study.show', compact('id', 'article', 'study'));
        }
        else{
            return abort(403, "To view the self-study, you must read the attached topic.");
        }
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

    public function studyDocs($id): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $filePath = public_path('article/' . $id . '.pdf');

        if (!file_exists($filePath)) {
            abort(404, 'PDF fayl topilmadi');
        }

        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
