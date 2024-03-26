<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="resources/js/showfilms.js"> </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @inertiaHead
  </head>
  <body>
    @inertia
    <script>

</script> 
  </body>
</html>