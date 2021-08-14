@extends('layouts.app')

@section('content')
<section id="banner">
    <div>
 <div class="row">
     <div class="col-md-8 ml-6" style="margin-left: 170px;">
         <div id="banner-title">Tender Notice Board</div>
         <div id="banner-subtitle">The Ultimate Zimbabwean Online Consultancy Gateway</div>
         <div class="d-flex banner-items">
             <div><i class="fa fa-check"></i></div>
             <div>Company Registration </div>
        </div>
         <div  class="d-flex banner-items">
             <div><i class="fa fa-check"></i></div>
             <div>Vender Registration </div>
        </div>
        <div  class="d-flex banner-items">
             <div><i class="fa fa-check"></i></div>
             <div>PRAZ Registration</div>
        </div>
        <div  class="d-flex banner-items">
             <div><i class="fa fa-check"></i></div>
             <div>TENDER & RFQ Notification</div>
        </div>
        <div>
        <a href="{{route('register')}}" type="button" class="btn btn-outline-secondary btn-lg">TRY OUR SERVICE</a>
        </div>
     </div>
 </div>
    </div>
   
 
</section>
<section>
    <div class="row">
        <div class="col-md-8 offset-md-2 services shadow-lg rounded p-3">
            <div class="row">
                <div class="col-md-6 text-center p-5">
                    <div><i class="fa fa-file-text-o"></i></div>
                    <div id="service-subtitle">
                    Vender Registration
                    </div>
                    <div>
                        Apply for a vendor number from the comfort of your office by follow simple steps
                        
                    </div>
                    <div>
                    <a href="{{route('register')}}" type="button" class="btn btn-outline-secondary btn-white mt-2">Get Started</a>
                    </div>
                    <div>

                    </div>
                </div>
                <div class="col-md-6 text-center p-5">
                <div><i class="fa fa-file-text-o"></i></div>
                <div id="service-subtitle">
                    Company Registration
                </div>
                <div>
                       Registering your company should not be hustle , try our simple online application process
                        
                    </div>
                <div>
                    <a href="{{route('register')}}" type="button" class="btn btn-outline-secondary btn-white mt-2">Get Started</a>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center p-5">
                    <div><i class="fa fa-file-text-o"></i></div>
                    <div id="service-subtitle">
                    PRAZ Registration
                    </div>
                    <div>
                       Do not miss out on any tender opportunity let us help you obtain a PRAZ certificate
                        
                    </div>
                <div>
                    <a href="{{route('register')}}" type="button" class="btn btn-outline-secondary btn-white mt-2">Get Started</a>
                </div>
                </div>
                <div class="col-md-6 text-center p-5">
                    <div><i class="fa fa-bullhorn"></i></div>
                    <div id="service-subtitle">
                   Tender & RFQ Notifications
                    </div>
                    <div>
                       Do not be left out Receive  tenders & RFQS notifications via email,whatsapp and push notifications
                        
                    </div>
                <div>
                    <a href="{{route('register')}}" type="button" class="btn btn-outline-secondary btn-white mt-2">Get Started</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="latest">
    <div class="container">
 <div id="latest-title">Latest Tenders & RFQs</div>
 <div class="mt-4">
     <table class="table table-hover">
         <thead>
             <tr>
                 
                 <th>Title</th>
                 <th>Closing Date</th>
                 <th>Type</th>
                 <th>Category</th>
                 <th>

                 </th>
             </tr>
         </thead>
         <tbody>

            @forelse ($notices as $notice )

            <tr>
                
            <td>{{$notice->title}}</td>
                 <td>{{$notice->closing_date}}</td>
                 <td>{{$notice->procurementtype->name}}</td>
                 <td>{{$notice->categorylist->name}}</td>
                 <td>
                     <button class="btn btn-sm btn-primary">View</button>
                 </td>
             </tr>
                
            @empty
                <tr>
                    <td colspan="5" class="text-center text-danger mt-5 mb-5">No Procurement notices found as Yet</td>
                </tr>
            @endforelse
             
           
           
            
           
           
         </tbody>
     </table>
 </div>
    </div>
</section>

@endsection