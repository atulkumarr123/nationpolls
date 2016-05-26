@if(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
    @if($poll->isPublishedByAdmin==0)
        <div class="form-group">
            <label for="isPublishedByAdmin">Publish By Admin:</label>
            <input type="checkbox" name="isPublishedByAdmin"
                   id="isPublishedByAdmin">
        </div>
    @else
        <div class="form-group">
            <label for="isPublishedByAdmin">Publish By Admin:</label>
            <input type="checkbox" name="isPublishedByAdmin"
                   id="isPublishedByAdmin"  checked>
        </div>
    @endif

    @if($poll->isPublished==0)
        <div class="form-group">
            <label for="isPublished">Publish:</label>
            <input type="checkbox" name="isPublished"
                   id="isPublished" disabled>
        </div>
    @else
        <div class="form-group">
            <label for="isPublished">Publish:</label>
            <input type="checkbox" name="isPublished"
                   id="isPublished"  checked disabled>
        </div>
    @endif
@else
    @if($poll->isPublished==0)
        <div class="form-group">
            <label for="isPublished">Publish:</label>
            <input type="checkbox" name="isPublished"
                   id="isPublished">
        </div>
    @else
        <div class="form-group">
            <label for="isPublished">Publish:</label>
            <input type="checkbox" name="isPublished"
                   id="isPublished"  checked>
        </div>
    @endif
@endif