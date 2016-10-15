<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Video</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Video</h1>
            <form method = 'get' action = '{{url("video")}}'>
                <button class = 'btn btn-danger'>Video Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{url("video")}}/{{$video->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="video_id">video_id</label>
                    <input id="video_id" name = "video_id" type="text" class="form-control" value="{{$video->video_id}}">
                </div>
                
                <div class="form-group">
                    <label for="video_title">video_title</label>
                    <input id="video_title" name = "video_title" type="text" class="form-control" value="{{$video->video_title}}">
                </div>
                
                <div class="form-group">
                    <label for="video_description">video_description</label>
                    <input id="video_description" name = "video_description" type="text" class="form-control" value="{{$video->video_description}}">
                </div>
                
                <div class="form-group">
                    <label for="video_category">video_category</label>
                    <input id="video_category" name = "video_category" type="text" class="form-control" value="{{$video->video_category}}">
                </div>
                
                <div class="form-group">
                    <label for="video_type">video_type</label>
                    <input id="video_type" name = "video_type" type="text" class="form-control" value="{{$video->video_type}}">
                </div>
                
                <div class="form-group">
                    <label for="video_upload_date">video_upload_date</label>
                    <input id="video_upload_date" name = "video_upload_date" type="text" class="form-control" value="{{$video->video_upload_date}}">
                </div>
                
                <div class="form-group">
                    <label for="video_total_views">video_total_views</label>
                    <input id="video_total_views" name = "video_total_views" type="text" class="form-control" value="{{$video->video_total_views}}">
                </div>
                
                <div class="form-group">
                    <label for="video_upload_user_id">video_upload_user_id</label>
                    <input id="video_upload_user_id" name = "video_upload_user_id" type="text" class="form-control" value="{{$video->video_upload_user_id}}">
                </div>
                
                <div class="form-group">
                    <label for="video_delete_date">video_delete_date</label>
                    <input id="video_delete_date" name = "video_delete_date" type="text" class="form-control" value="{{$video->video_delete_date}}">
                </div>
                
                
                <button class = 'btn btn-primary' type ='submit'>Update</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
