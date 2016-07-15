<div class="dropzone-container" style="margin: 30px 0 0 30px;">
    <div id="dropzone">

        <div>
            @if($user->image!="")
                <img src=<?php echo "/img/" . $user->image;?> >
            @else
                <span class="dropzone-text">Upload photos</span>
            @endif

        </div>
        <input type="file" accept="image/png,image/jpeg" name="image"/>
    </div>
    <i> Click to edit</i>
</div>

