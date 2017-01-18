<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <style>
            html, body {
                height: 100%;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>List of temporary pages to view the design</h2>
                    <div class="list-group">
                          <a href="{{url('home_page')}}" class="list-group-item">Home</a>
                          <a href="{{url('admin_page')}}" class="list-group-item">Admin Page (Not Secured)</a>
                          <a href="{{url('instructors_list_page')}}" class="list-group-item">Instructors List page</a>
                          <a href="{{url('instructor_single_page')}}" class="list-group-item">Single instructor page</a>
                          <a href="{{url('login_page')}}" class="list-group-item">Login page</a>
                          <a href="{{url('register_as_instructor_page')}}" class="list-group-item">Register as instructor page</a>
                          <a href="{{url('register_as_learner_page')}}" class="list-group-item">Register as learner page</a>
                          <a href="{{url('blog_list_page')}}" class="list-group-item">Blog list page</a>
                          <a href="{{url('blog_single_page')}}" class="list-group-item">Single blog page</a>
                          <a href="{{url('contact_page')}}" class="list-group-item">Contact page</a>
                          <a href="{{url('404_page')}}" class="list-group-item">404 page</a>

                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
