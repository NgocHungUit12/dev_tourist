@foreach($replies as $reply)
    <div class="reply">
        <h6 style="font-weight: bold; font-size: 13px; padding-top: 10px;">{{ $reply->user->name }}
          @if($reply->IsUserComment)
            <div class="dropdown">
                <i class="fa fa-ellipsis-v dropbtn" aria-hidden="true" style="padding: 5px; padding-right: 30px;"></i>
                <div class="dropdown-content">
                  
                  <form   action="{{ route('reviews.delete', $reply) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button onClick="return confirm('Are you sure !')" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                  </form>
                </div>
                {{$reply->created_at}}
            </div>
          @endif
        </h6>
        
        
        @if($reply->parentReview && $reply->parentReview->user)
            <p style="margin-top: -5px;">
                <strong >#{{ $reply->parentReview->user->name }}:</strong> 
                {{ $reply->review }} 
            </p>
            <div style="padding-left: 5px; margin-top: -15px; padding-bottom: 10px;"> 
                <i class="fa {{ $reply->isLiked ? 'fa-heart' : 'fa-heart-o' }}" aria-hidden="true" data-review-id="{{ $reply->id }}"></i> &nbsp;
                <span class="likes-count">{{ $reply->likesCount }}</span>
                <a href="" class="btn-show-reply-form1" data-id="{{$reply->id}}" style="color: #212529; font-size: 13px; font-weight: bold">Trả lời</a>
                <form action="{{ route('user.reply_review', $reply) }}" method="POST" style="display: none" class="replyForm1 form-reply1-{{$reply->id}}">
                  @csrf
                    <div class="form-group">
                      
                      <textarea name="review" cols="60" rows="3" required placeholder="Nhập nội dung (*)"></textarea>
                    </div>
                    <input type="hidden" name="parent_id" value="{{$reply->id}}">
                    <input type="hidden" name="tour_id" value="{{$tour->id}}">
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Gửi phản hồi</button>
                </form>
              </div>
            @if($reply->replies)
        @endif
            
            @include('partials.replies', ['replies' => $reply->replies])
        @endif
    </div>
@endforeach



