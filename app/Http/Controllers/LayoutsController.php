<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutsController extends Controller
{
    public array $topics;

    public function __construct()
    {
        $this->topics = array(
            [
                "title" => "Theme 1. Introduction to research writing.",
                "url" => "/topic/1",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/1-theme.docx",
                "video" => "/topic/1/video",
                "video_url" => "1-video.mp3",
                "self_study" => "/topic/1/self-study"
            ],
            [
                "title" => "Theme 2. The steps in the process of research.",
                "url" => "/topic/2",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/2-theme.docx",
                "video" => "/topic/2/video",
                "video_url" => "2-video.mp3",
                "self_study" => "/topic/2/self-study"
            ],
            [
                "title" => "Theme 3. Methods for composing a Literature Review.",
                "url" => "/topic/3",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/3-theme.docx",
                "video" => "/topic/3/video",
                "video_url" => "3-video.mp3",
                "self_study" => "/topic/3/self-study"
            ],
            [
                "title" => "Theme 4. Scientific literature analysis. Writing scientific articles.",
                "url" => "/topic/4",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/4-theme.docx",
                "video" => "/topic/4/video",
                "video_url" => "4-video.mp3",
                "self_study" => "/topic/4/self-study"
            ],
            [
                "title" => "Theme 5. Writing an Introduction. Qualities of a Good Abstract.",
                "url" => "/topic/5",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/5-theme.docx",
                "video" => "/topic/5/video",
                "video_url" => "5-video.mp3",
                "self_study" => "/topic/5/self-study"
            ],
            [
                "title" => "Theme 6. Presentation of data in various graphical and tabular forms.",
                "url" => "/topic/6",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/6-theme.docx",
                "video" => "/topic/6/video",
                "video_url" => "6-video.mp3",
                "self_study" => "/topic/6/self-study"
            ],
            [
                "title" => "Theme 7. Writing annotation for research paper.",
                "url" => "/topic/7",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/7-theme.docx",
                "video" => "/topic/7/video",
                "video_url" => "7-video.mp3",
                "self_study" => "/topic/7/self-study"
            ],
            [
                "title" => "Theme 8. Methods of avoiding plagiarism. Copyright and plagiarism.",
                "url" => "/topic/8",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/8-theme.docx",
                "video" => "/topic/8/video",
                "video_url" => "8-video.mp3",
                "self_study" => "/topic/8/self-study"
            ],
            [
                "title" => "Theme 9. The aims of the research paper. Techniques for examining organization.",
                "url" => "/topic/9",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/9-theme.docx",
                "video" => "/topic/9/video",
                "video_url" => "9-video.mp3",
                "self_study" => "/topic/9/self-study"
            ],
            [
                "title" => "Theme 10. The results of a scientific paper. Tasks of Literature review.",
                "url" => "/topic/10",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/10-theme.docx",
                "video" => "/topic/10/video",
                "video_url" => "10-video.mp3",
                "self_study" => "/topic/10/self-study"
            ],
            [
                "title" => "Theme 11. Writing the conclusion. Practical approach to writing conclusion.",
                "url" => "/topic/11",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/11-theme.docx",
                "video" => "/topic/11/video",
                "video_url" => "11-video.mp3",
                "self_study" => "/topic/11/self-study"
            ],
            [
                "title" => "Theme 12. Research ethics and responsible conduct.",
                "url" => "/topic/12",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/12-theme.docx",
                "video" => "/topic/12/video",
                "video_url" => "12-video.mp3",
                "self_study" => "/topic/12/self-study"
            ],
            [
                "title" => "Theme 13. Qualitative, quantitative, and mixed methods research.",
                "url" => "/topic/13",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/13-theme.docx",
                "video" => "/topic/13/video",
                "video_url" => "13-video.mp3",
                "self_study" => "/topic/13/self-study"
            ],
            [
                "title" => "Theme 14. Quality criteria and other research issues.",
                "url" => "/topic/14",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/14-theme.docx",
                "video" => "/topic/14/video",
                "video_url" => "14-video.mp3",
                "self_study" => "/topic/14/self-study"
            ],
            [
                "title" => "Theme 15. Longitudinal versus cross-sectional research.",
                "url" => "/topic/15",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/15-theme.docx",
                "video" => "/topic/15/video",
                "video_url" => "15-video.mp3",
                "self_study" => "/topic/15/self-study"
            ],
            [
                "title" => "Theme 16. Quantitative data collection.",
                "url" => "/topic/16",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/16-theme.docx",
                "video" => "/topic/16/video",
                "video_url" => "16-video.mp3",
                "self_study" => "/topic/16/self-study"
            ],
            [
                "title" => "Theme 17. Qualitative data collection.",
                "url" => "/topic/17",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/17-theme.docx",
                "video" => "/topic/17/video",
                "video_url" => "17-video.mp3",
                "self_study" => "/topic/17/self-study"
            ],
            [
                "title" => "Theme 18. Mixed methods research: purpose and design.",
                "url" => "/topic/18",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/18-theme.docx",
                "video" => "/topic/18/video",
                "video_url" => "18-video.mp3",
                "self_study" => "/topic/18/self-study"
            ],
            [
                "title" => "Theme 19. Data analysis in qualitative, quantitative, mixed methods research.",
                "url" => "/topic/19",
                "content" => "Topic details",
                "topic_detail_url" => "/docs/19-theme.docx",
                "video" => "/topic/19/video",
                "video_url" => "19-video.mp3",
                "self_study" => "/topic/19/self-study"
            ],
            [
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
}
