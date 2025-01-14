@extends('layouts.admin')

@section('content')
    <style>
        #content h1, #content h2, #content h3 {
            color: #333;
            font-weight: bold;
            margin-top: 20px;
        }

        #content p {
            line-height: 1.8;
            font-size: 16px;
            margin-bottom: 10px;
        }

        #content ul, #content ol {
            margin: 10px 0;
            padding-left: 20px;
        }

        #content blockquote {
            font-size: 18px;
            font-style: italic;
            color: #555;
            border-left: 4px solid #ddd;
            padding-left: 10px;
            margin: 20px 0;
        }

        #content table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        #content table th, #content table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #content table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        #content img {
            max-width: 100%; /* Rasm sahifadan chiqib ketmasligi uchun */
            height: auto; /* Proportsiyani saqlash */
            margin: 10px 0; /* Yuqoridan va pastdan bo‘shliq */
            display: block; /* Rasm markazda chiqishi uchun */
        }

        #content img.center {
            margin-left: auto;
            margin-right: auto;
        }

        #content img.border {
            border: 2px solid #ddd; /* Chegara */
            border-radius: 5px; /* Burchaklarni yumaloq qilish */
            padding: 5px; /* Chegara va rasm o‘rtasidagi masofa */
            background-color: #f8f9fa; /* Chegara uchun fon rangi */
        }

        #content p {
            display: flex;
            flex-wrap: wrap;
        }

        #content img {
            margin-right: 5px;
        }
    </style>
    <div class="card adminuiux-card mb-3">
        <div class="card-body pb-0 my-2">
            <div class="row">
                <div class="col-md-12">
                    <!-- Word kontentni ko'rsatish uchun -->
                    <div id="content" class="p-3 border rounded bg-light"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mammoth.js kutubxonasi -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>

    <script>
        // Laraveldan kelgan fayl yo'li
        const filePath = "{{ $filename }}";

        // Word faylni yuklash va kontentni chiqarish
        fetch(filePath)
            .then(response => response.arrayBuffer())
            .then(arrayBuffer => {
                mammoth.convertToHtml({arrayBuffer: arrayBuffer}, {
                    styleMap: [
                        "p[style-name='Heading 1'] => h1",
                        "p[style-name='Heading 2'] => h2",
                        "p[style-name='Normal'] => p",
                        "p[style-name='Quote'] => blockquote"
                    ]
                })
                    .then(function (result) {
                        // HTML kontentni sahifaga joylash
                        document.getElementById('content').innerHTML = result.value;

                        // Agar ogohlantirishlar bo'lsa, ularni konsolga chiqarish
                        if (result.messages.length > 0) {
                            console.warn("Mammoth.js ogohlantirishlari:", result.messages);
                        }
                    })
                    .catch(function (err) {
                        console.error("Error converting Word file: ", err);
                    });
            })
            .catch(error => {
                console.error("Error fetching the file: ", error);
                document.getElementById('content').innerHTML =
                    `<div class="alert alert-danger">Faylni yuklashda xatolik yuz berdi.</div>`;
            });
    </script>
@endsection
