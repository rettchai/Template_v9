<div>
    <x-slot name="header">
        ยืมอุปกรณ์
    </x-slot>
</div>

    <div class="container-fluid ">
        <div class="card card-body  shadow-blur m-3 ">
            <div class="row gx-4">
                <div class="col-auto">
                    รายการห้องเรียน-ห้องประชุม
                </div>
            </div>
            <div class="row gx-4">
                <div class="col-md-4">
                    <x-input type="date" label="วันที่เริ่มต้น"></x-input>
                </div>
                <div class="col-md-4">
                    <x-input type="date" label="วันที่สิ้นสุด"></x-input>
                </div>
                <div class="col-md-4">
                    <x-button class="h-full w-full" info label="ค้นหา"></x-button>
                </div>
            </div>
            <div class="row gx-4">
                <!-- Carousel wrapper -->
                <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center"
                    data-mdb-ride="carousel">

                    <!-- Inner -->
                    <div class="carousel-inner py-4">

                        <!-- Single item -->
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row pt-4">

                                    @for ($i = 0; $i < 6; $i++)
                                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                            <div class="card">
                                                <img src="{{ asset('room_ava.jpg') }}" height="500px"
                                                    class="card-img-top" alt="Peaks Against the Starry Sky" />
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        ชื่อห้องประชุม
                                                    </h5>
                                                    <p class="card-text">
                                                        รายละเอียดห้องประชุม
                                                        Some quick example text to build on the card title and make up
                                                        the
                                                        bulk
                                                        of the card's content.
                                                    </p>
                                                    <x-button warning label="ตรวจสอบ"></x-button>
                                                    <x-button info label="รายละเอียด"></x-button>

                                                </div>
                                            </div>
                                        </div>
                                    @endfor


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Inner -->
                </div>
                <!-- Carousel wrapper -->
            </div>
        </div>
    </div>
