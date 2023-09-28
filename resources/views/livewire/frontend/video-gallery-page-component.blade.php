@section('page-title')
    {{ 'ভিডিও গ্যালারি' }}
@endsection
@section('page-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const videoData = <?= json_encode(array_values($videos)) ?>;

        // Function to play the YouTube video
        function playYouTubeVideo(videoId) {
            // Replace 'video-container' with the ID of your video container element
            const videoContainer = document.getElementById("video-container");

            if (videoContainer) {
                // Clear any previous content in the video container
                videoContainer.innerHTML = "";

                // Create an iframe for the YouTube video
                const iframe = document.createElement("iframe");
                iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                iframe.frameborder = 0;
                iframe.allowfullscreen = true;
                iframe.width = "100%";
                iframe.height = "410";

                // Append the iframe to the video container
                videoContainer.appendChild(iframe);
            }
        }

        // Populate the carousel with YouTube video thumbnails as playable videos
        const carousel = document.querySelector(".owl-carousel");

        videoData.forEach((videoId) => {
            const videoItem = document.createElement("div");
            videoItem.classList.add("item");

            const videoThumbnail = document.createElement("a");
            videoThumbnail.href = "javascript:void(0);";
            videoThumbnail.classList.add("video-thumbnail");
            videoThumbnail.dataset.videoId = videoId;

            const videoPlaceholder = document.createElement("div");
            videoPlaceholder.classList.add("video-placeholder");

            const videoImage = document.createElement("img");
            videoImage.src = `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
            videoImage.alt = "Video Thumbnail";

            const playButton = document.createElement("div");
            playButton.classList.add("play-button");

            videoPlaceholder.appendChild(videoImage);
            videoPlaceholder.appendChild(playButton);
            videoThumbnail.appendChild(videoPlaceholder);
            videoItem.appendChild(videoThumbnail);
            carousel.appendChild(videoItem);

            videoThumbnail.addEventListener("click", () => {
                playYouTubeVideo(videoId);
            });
        });
        // Initialize the Owl Carousel after adding all items
        $(".owl-carousel").owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            navText: [
                "<i class='fa-solid fa-caret-left'></i>",
                "<i class='fa-solid fa-caret-right'></i>",
            ],
            autoHeightClass: "owl-height",
            responsive: {
                360: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
            },
        });
    </script>
@endsection

<div>
    <h4 class="mb-3 mt-4 d-block text-center">{{ __('ভিডিও গ্যালারি') }}</h4>
    <div id="video-container"></div>

    <div class="owl-carousel">
        <!-- Carousel items will be dynamically added here -->
    </div>

</div>
