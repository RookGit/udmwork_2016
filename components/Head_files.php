<meta property="og:image" content="<?= Config::get_data("img_link") ?>"/>
<link rel="shortcut icon" href="/template/images/favicon.ico" type="image/x-icon">


<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<!-- Beautiful select -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- Search js -->
<script src="/template/js/site/search_hello.js"></script>

<div ID="toTop">^</div>

<!-- Landing css -->
<link href="/template/css/hello.css" rel="stylesheet">

<!-- VK API -->
<script src="https://vk.com/js/api/openapi.js?154" type="text/javascript"></script>

<!-- Animation libs -->
<script src="/template/js/fm.revealator.jquery.js"></script>
<link href="/template/css/fm.revealator.jquery.css" rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<!-- Site  -->
<link href="/template/css/style_file.css" rel="stylesheet">
<script src="/template/js/other_script.js"></script>

<?php if (Config::get_data("included_snow")) { ?>

    <script src="/template/js/jquery.snow.js"></script>
    <script>
        $(document).ready(function () {
            $.fn.snow({minSize: 5, maxSize: 15, newOn: 500, flakeColor: '#ffffff'});
        });
    </script>

<?php } ?>


<div ID="toTop">^</div>
