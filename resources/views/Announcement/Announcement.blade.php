@extends("layouts.layout")
@section("title", "Pengumuman")
@section("content")
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assetsz/img/home/alkitab.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Warta Jemaat</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Warta Jemaat</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
    
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        
        <div class="row gy-4 posts-list">
          @foreach ($data as $row)
          <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100">
              <div class="post-img position-relative overflow-hidden">
                <img src="{{ asset($row->photo)}}" style="width: 100% ; height:15em " class="img-fluid" alt="">
                <span class="post-date">{{ $row->tanggal }}</span>
              </div>
              <div class="post-content d-flex flex-column">
                <h3 class="post-title">{{ $row->judul }}</h3>
                <p>{{ $row->keterangan }}</p>
                <hr>
                <a href="#" class="moredetails"><span>Lihat lebih jelas</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End post list item -->
          @endforeach

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

@endsection
@push('warta')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assetsz/js/jquery-3.4.1.slim.min.js"></script>
<script>
  function showmore(image, title, deskripsi) {
    Swal.fire({
      title: title,
      text: deskripsi,
      imageUrl: image,
      imageWidth: 500,
      imageHeight: 400,
      imageAlt: 'Custom image',
    });
  }

  $(document).ready(function() {
    $('.moredetails').click(function(event) {
      event.preventDefault();
      var postitem = $(this).closest('.post-item');
      var image = postitem.find('img').attr('src');
      var title = postitem.find('.post-title').text();
      var deskripsi = postitem.find('p').text();

      showmore(image, title, deskripsi);
    });
  });
</script>


@endsection
