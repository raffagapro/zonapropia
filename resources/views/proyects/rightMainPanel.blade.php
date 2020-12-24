<div class="col-md-8 rightpanel">
  <!-- Mini Filter Bar -->
  @include('proyects.miniFilterBar')
  <!-- Propety List -->
  <div class="row mainbody">
    <x-proyects.gridItem />
    <x-proyects.gridItem />
    <h1 class="text-center">----------LIST---------------</h1>
    <x-proyects.listItem />

  </div>
  <!-- Paginator -->
  <div class="row grid-paginator">
    <nav>
      <ul class="pagination">
        <li class="page-item disabled">
          <span class="page-link"><</span>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active pagi-active" aria-current="page">
          <span class="page-link">
            2
            <span class="sr-only">(current)</span>
          </span>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">></a>
        </li>
      </ul>
    </nav>
  </div>
</div>
