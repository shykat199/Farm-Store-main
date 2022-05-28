<div class="section my-4 py-5 clearfix">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row common-height align-items-center clearfix">
               <div class="col-md-7" style="background: url('images/1.jpg') center center no-repeat; background-size: cover; height:100%">
                  <div class="vertical-middle pl-5">
                  </div>
               </div>
               <div class="col-md-5 bg-white">
                  <div class="card noborder py-2">
                     <div class="card-body">
                        <h3 class="card-title mb-4 ls0">Sign up to get the most out of shopping.</h3>
                        <ul class="iconlist ml-3">
                           <li><i class="icon-circle-blank text-black-50"></i> Receive Exclusive Sale Alerts
                           </li>
                           <li><i class="icon-circle-blank text-black-50"></i> Cash on Delivery Accepted
                           </li>
                        </ul>
                         <?php
                         if (!isset($_SESSION['id'])) {
                         ?>
                        <a href="Signup" class="button button-rounded ls0 t600 ml-0 mb-2 nott px-4 text-dark" style="background-color: #2bff01;">Sign
                           Up</a><br>
                        <small class="font-italic text-black-50">Don't worry, it's totally free.</small>
                             <?php
                         }
                         ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>