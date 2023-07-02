<div class="row">
    <div class="col-lg-12">
        <div class="product__pagination">
            @if (count($elements[0]) > 3)
                @if ( $paginator->currentPage() == $paginator->lastPage() )
                    <a href="{{ $paginator->url(1) }}">{{ 1 }}</a>
                    <span>...</span>
                    <a href="{{$paginator->url($paginator->currentPage() - 1)}}">{{ $paginator->currentPage() - 1}}</a>
                    <a href="{{$paginator->url($paginator->currentPage() - 2)}}">{{ $paginator->currentPage() - 2 }}</a>
                    <a class="active" href="{{$paginator->url($paginator->currentPage())}}">{{ $paginator->currentPage() }}</a>
                @elseif($paginator->currentPage() == 1)
                    <a class="active" href="{{$paginator->url($paginator->currentPage())}}">{{ $paginator->currentPage() }}</a>
                    <a href="{{$paginator->url($paginator->currentPage() + 1)}}">{{ $paginator->currentPage() + 1}}</a>
                    <a href="{{$paginator->url($paginator->currentPage() + 2)}}">{{ $paginator->currentPage() + 2 }}</a>
                    <span>...</span>
                    <a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                @else
                    <a href="{{$paginator->url($paginator->currentPage() - 1)}}">{{ $paginator->currentPage() - 1}}</a>
                    <a class="active" href="{{$paginator->url($paginator->currentPage())}}">{{ $paginator->currentPage() }}</a>
                    <a href="{{$paginator->url($paginator->currentPage() + 1)}}">{{ $paginator->currentPage() + 1 }}</a>
                    <span>...</span>
                    <a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                @endif
            @else
                @for($i = 1; $i <= count($elements[0]); $i++)
                    <a href="{{ $paginator->url($i) }}" {{$paginator->currentPage() == $i ? "class=active" : ''}}>{{$i}}</a>
                @endfor
            @endif
        </div>
        </div>
    </div>
</div>



