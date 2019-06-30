<div class="clearfix">

    <!-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> -->
    <ul class="pagination">
        <li class="page-item disabled"><a href="{{ $paginator->url(1) }}">Previous</a></li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
        </li>
    </ul>
</div>