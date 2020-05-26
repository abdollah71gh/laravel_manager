<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/css/shared/style.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/css/demo_1/style.css')}}">
  <link rel="shortcut icon" href="{{url('/back/assets/images/favicon.png')}}" />
  <link rel='stylesheet' href='https://harvesthq.github.io/chosen/chosen.css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>
  <div class="container-scroller">
    @include('back.navbar')
    <div class="container-fluid page-body-wrapper">

     @include('back.sidebar')

    @yield('content')

    </div>

  </div>

  <script src="{{url('/back/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{url('/back/assets/vendors/js/vendor.bundle.addons.js')}}"></script>

  <script src="{{url('/back/assets/js/shared/off-canvas.js')}}"></script>
  <script src="{{url('/back/assets/js/shared/misc.js')}}"></script>

  <script src="{{url('/back/assets/js/demo_1/dashboard.js')}}"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
  <script src='http://harvesthq.github.io/chosen/chosen.jquery.js'></script>
  <script src="{{url('/back/assets/js/multiselect.js')}}"></script>

{{--  install link tiny mce4--}}
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
{{--  scripti editor tinymc4--}}

  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
      var editor_config = {
          path_absolute : "/",
          selector: "textarea#editor",
          plugins: [
              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars code fullscreen",
              "insertdatetime media nonbreaking save table contextmenu directionality",
              "emoticons template paste textcolor colorpicker textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          relative_urls: false,
          file_browser_callback : function(field_name, url, type, win) {
              var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
              var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

              var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
              if (type == 'image') {
                  cmsURL = cmsURL + "&type=Images";
              } else {
                  cmsURL = cmsURL + "&type=Files";
              }

              tinyMCE.activeEditor.windowManager.open({
                  file : cmsURL,
                  title : 'Filemanager',
                  width : x * 0.8,
                  height : y * 0.8,
                  resizable : "yes",
                  close_previous : "no"
              });
          }
      };

      tinymce.init(editor_config);
  </script>
<script>
document.addEventListener("DOMContentLoaded", function() {

document.getElementById('button-image').addEventListener('click', (event) => {
  event.preventDefault();

  window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
});
});

// set file link
function fmSetLink($url) {
document.getElementById('image_label').value = $url;
}
</script>

</body>

</html>
