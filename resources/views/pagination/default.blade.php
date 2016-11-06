<ul class="pagination">
  @if(PaginateRoute::hasPreviousPage())
  <li>
    <a href="{{ PaginateRoute::previousPageUrl() }}" rel="prev">«</a>
  </li>
  @else
  <li>
    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span>
  </a>
  @endif

  @for ($i = 1; $i <= $paginator->lastPage(); $i++)
  <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
    <a href="{{ PaginateRoute::pageUrl($i) }}">{{ $i }}</a>
  </li>
  @endfor

  @if(PaginateRoute::hasNextPage($paginator))
  <li>
    <a href="{{ PaginateRoute::nextPageUrl($paginator) }}" rel="next">»</a>
  </li>
  @else 
  <li>
    <li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">»</span>
  </a>
  @endif

</ul>