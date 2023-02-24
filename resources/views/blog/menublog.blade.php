<div class="sidebar-block">
   <div class="sidebar-area">
      <aside id="va_recentpost-2" class="widget widget_va_recentpost">
         <div class="widget-panel">
            <h3 class="widget-title">Bài viết mới nhất</h3>
         </div>
         <ul class="post--view">
            @foreach ($news as $item)
               <li class="clearfix">
                  <div class="thumb">
                     <a title="" href="{{route('detailBlog',['slug'=>$item->slug])}}"><img width="280" height="280" src="{{$item->image}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="Glenlivet_Xanh_Tim_1l" loading="lazy" srcset="{{$item->image}} 280w, {{$item->image}} 300w, {{$item->image}} 100w, {{$item->image}} 320w" sizes="(max-width: 280px) 100vw, 280px" /></a>
                  </div>
                  <div class="post">
                     <h5><a title="{{languageName($item->title)}}" href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a></h5>
                  </div>
               </li>
            @endforeach
         </ul>
      </aside>
    
   </div>
   <!-- .widget-area -->                    
</div>