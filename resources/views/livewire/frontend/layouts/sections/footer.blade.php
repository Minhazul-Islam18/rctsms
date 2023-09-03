   @php
       $FooterWidget1 = DB::table('footer_widget1s')->first();
       $FooterWidget2 = DB::table('footer_widget2s')->first();
   @endphp
   <footer class="site__footer bg-light">
       <div class="row px-2 py-3">

           <div class="col-md-3 col-sm-12 col-12">
               <div class="d-flex flex-column align-items-start">
                   <span class="fw-bold">{{ $FooterWidget1->title }}</span>
                   <span class="text-start">
                       {!! $FooterWidget1->text !!}
                   </span>
               </div>
           </div>
           <div class="col-md-6 col-12"></div>
           <div class="col-md-3 col-sm-12 col-12">
               <div class="d-flex flex-column align-items-end">
                   <span class="fw-bold">{{ $FooterWidget2->title }}</span>

                   <div class="text-end">
                       {!! $FooterWidget2->text !!}
                   </div>
               </div>
           </div>
       </div>
       <div class="footer__bottom">
           <div class="d-block text-center bg-white pt-3 pb-2">
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
