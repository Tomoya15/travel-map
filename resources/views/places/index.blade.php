@extends('layouts.app')

@section('content')
    
    <div class="index-container">
        
        
          <h1>リスト</h1>
     
        
        <div class="index-grid">
            @if (count($places) > 0)
          
                
                @foreach ($places as $place)
                
                <div class="index-wrapper">
                    <div class="index-box">
                        <img src="/uploads/{{ $place->profile_photo }}" width="500px" height="auto">
                        <table class="index-table">
                        
                        <!--<tr>-->
                        <!--<td>ID</td>-->
                        <!--<td>{{ $place->id }}</td>-->
                        <!--</tr>-->

                        <!--<tr>-->
                        <!--<td>UserID</td>-->
                        <!--<td>{{ $place->user_id }}</td>-->
                        <!--</tr> -->
                        
                        <tr>
                        <td>名前</td>
                        <td>{{ $place->place_name }}</td>
                        </tr>
                        <tr>
                        <td>ジャンル</td>
                        <td>{{ $place->country }}</td>
                        </tr>
                        <tr>
                        <td>住所</td>
                        <td>{{ $place->address }}</td>
                        </tr>
                        <tr>
                        <td>電話番号</td>
                        <td>{{ $place->phone }}</td>
                        </tr>
                        <tr>
                        <td>リンク</td>
                        <td>{{ $place->link }}</td>
                        </tr>
                        <tr>
                        <td>コメント</td>
                        <td>{{ $place->comment }}</td>
                        </tr> 
                        
                        <tr>
                        <td>タグ</td>
                        <td>@if(count($place->hashTags) > 0)
                            @foreach($place->hashTags as $hash_tag)
                                        <a href="{{ route('hash_tags.places', ['id' => $hash_tag->id]) }}">
                                            <span>#{{ $hash_tag->name }}</span>
                                        </a>
                            @endforeach
                        @endif
                        </td>
                        </tr> 
                        </table>
                        
                        
                        
                        <div class="show-link">
                                    <a href="{{ route('places.show', ['place' => $place->id]) }}">
                                    For More
                                    </a>
                                    @if (Auth::check())
                                        @if (Auth::user()->is_favorite($place->id))
                                        <div class="favorite-delete">
                                            {{-- アンフォローボタンのフォーム --}}
                                            {!! Form::open(['route' => ['favorites.unfavorite', $place->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('お気に入りを削除', ['class' => ""]) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        @else
                                        <div class="favorite-register">
                                            {{-- フォローボタンのフォーム --}}
                                            {!! Form::open(['route' => ['favorites.favorite', $place->id]]) !!}
                                            {!! Form::submit('お気に入りに登録', ['class' => "" ]) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        @endif
                                    @else
                                    @endif
                                    
                                    
                        </div>
                        
                        
                        
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        
    </div>    
        
            
   


@endsection

 
 
 
 




 