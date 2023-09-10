   @php
       //    $FooterWidget1 = DB::table('footer_widget1s')->first();
       $FooterWidget2 = DB::table('footer_widget2s')->first();
       $FooterWidget3 = DB::table('footer_widget3s')->first();
   @endphp
   <footer class="site__footer">
       <div class="row px-2 py-3">
           {{-- @if ($FooterWidget1->status) --}}
           <div class="col-md-4 col-sm-12 col-12">
               <div class="d-flex flex-column align-sm-center align-md-start">
                   <span class="fw-bold">{{ __('কারিগরী সহায়তায়') }}</span>
                   <span class="text-start">
                       <a href="http://www.rctseba.com">{{ __('আরসিটি সেবা') }}</a> {{ __(', ভোলা') }}
                   </span>
               </div>
           </div>
           {{-- @endif --}}
           @if ($FooterWidget2->status)
               <div class="col-md-4 col-sm-12 col-12">
                   <div class="d-flex flex-column  align-sm-center align-md-center">
                       <span class="fw-bold d-block text-center">{{ $FooterWidget2->title }}</span>

                       <div class="">
                           {!! $FooterWidget2->text !!}
                       </div>
                   </div>
               </div>
           @endif
           @if ($FooterWidget3->status)
               <div class="col-md-4 col-sm-12 col-12">
                   <div class="d-flex flex-column  align-sm-center align-md-end">
                       <span class="fw-bold">{{ $FooterWidget3->title }}</span>

                       <div class="text-end">
                           {!! $FooterWidget3->text !!}
                       </div>
                   </div>
               </div>
           @endif
       </div>
       <div class="footer__bottom py-2">
           <h5 class="d-block text-center fw-bold m-0 text-white">{{ get_settings('school_name') }}</h5>
           <div class="d-block text-center pt-3 pb-2 text-white">
               @php
                   use Illuminate\Support\Carbon;
                   $lastCommitDate = shell_exec('git log -1 --format=%cd');
                   $carbonDate = Carbon::parse($lastCommitDate);
                   // Format the Carbon date in the desired format
                   $formattedDate = $carbonDate->format('D M j H:i:s Y');
                   // Output the formatted date
                   function englishToBanglaDate($dateString)
                   {
                       $months = [
                           'Jan' => 'জানুয়ারি',
                           'Feb' => 'ফেব্রুয়ারি',
                           'Mar' => 'মার্চ',
                           'Apr' => 'এপ্রিল',
                           'May' => 'মে',
                           'Jun' => 'জুন',
                           'Jul' => 'জুলাই',
                           'Aug' => 'আগস্ট',
                           'Sep' => 'সেপ্টেম্বর',
                           'Oct' => 'অক্টোবর',
                           'Nov' => 'নভেম্বর',
                           'Dec' => 'ডিসেম্বর',
                       ];
                   
                       $days = [
                           'Mon' => 'সোমবার',
                           'Tue' => 'মঙ্গলবার',
                           'Wed' => 'বুধবার',
                           'Thu' => 'বৃহস্পতিবার',
                           'Fri' => 'শুক্রবার',
                           'Sat' => 'শনিবার',
                           'Sun' => 'রবিবার',
                       ];
                       // Replace English month and day names with Bangla names
                       $dateString = str_replace(array_keys($months), array_values($months), $dateString);
                       $dateString = str_replace(array_keys($days), array_values($days), $dateString);
                   
                       // Replace English numbers with Bangla numbers
                       $dateString = numberToBangla($dateString);
                   
                       return $dateString;
                   }
                   
                   function numberToBangla($number)
                   {
                       $banglaNumbers = [
                           '0' => '০',
                           '1' => '১',
                           '2' => '২',
                           '3' => '৩',
                           '4' => '৪',
                           '5' => '৫',
                           '6' => '৬',
                           '7' => '৭',
                           '8' => '৮',
                           '9' => '৯',
                       ];
                   
                       return strtr($number, $banglaNumbers);
                   }
                   
                   $dateString = $formattedDate;
                   $banglaDate = englishToBanglaDate($dateString);
                   
                   echo 'সর্বশেষ আপডেট: ' . $banglaDate; // Output will be in Bangla with Bangla numbers
                   
               @endphp
           </div>
       </div>
   </footer>
