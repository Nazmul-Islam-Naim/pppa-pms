@extends('layouts.frontend-app')
@section('content')

<!--Activity Area Start-->
<div>
    <div class="container text-center mt-5">
        <h3>PPP FAQ</h3>
    </div>
</div>
<div class="container">
    <!-- Row start -->
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <!-- Card start -->
				<div class="card">
                    <div class="card-body">
                        
                        <!-- Faq start -->
                        @foreach($faqs as $key => $faq)
                        <div class="accordion" id="faqAccordion{{$key+1}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne{{$key+1}}">
                                    <!--<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$key+1}}" aria-expanded="true" aria-controls="collapseOne">-->
                                    <!--    {{$key+1}}. Who can sell items?-->
                                    <!--</button>-->
                                     <a class="accordion-button" data-bs-toggle="collapse" href="#collapseOne{{$key+1}}" aria-expanded="true" aria-controls="collapseOne{{$key+1}}{{$key+1}}">
                                       {{$key+1}}. {{$faq->question}}?
                                      </a>
                                </h2>
                                <div id="collapseOne{{$key+1}}" class="accordion-collapse collapse show" aria-labelledby="headingOne{{$key+1}}" data-bs-parent="#faqAccordion{{$key+1}}">
                                    <div class="accordion-body">
                                        <p>{{$faq->answer}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Faq end -->
                        @if(count($faqs)<1)
                        <p class="text-center">No Faqs.......</p>
                        @endif
                    </div>
                </div>
				<!-- Card end -->

			</div>
		</div>
		<!-- Row end -->
</div>
<!--End of Activity Area-->
@endsection