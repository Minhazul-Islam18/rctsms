@section('page-title')
    {{ 'অধ্যয়নরত শিক্ষার্থীর সংখ্যা' }}
@endsection
@php
    $secs = [];
    // dd($secs);
    $array_count = 1;
@endphp
@foreach ($classes as $item)
    @foreach ($item->sections as $item)
        @php
            $array_count++;
            $secs[] = $item->section_name;
        @endphp
    @endforeach
@endforeach

<div>
    <h3 class="d-block my-4 text-center fw-bold">অধ্যয়নরত শিক্ষার্থীর সংখ্যা</h3>
    <div class="row g-2 mt-2">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-info">
                    <thead>
                        <tr class="border-top">
                            <th scope="col" class="border-end border-start">শ্রেণী</th>
                            <th scope="col" colspan="3" class="border-end">
                                <span class="d-block text-center">শিক্ষার্থী</span>
                            </th>
                            <th scope="col" colspan="{{ $array_count }}" class="border-end"><span
                                    class="d-block text-center">বিভাগঃ</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row" class="border-end border-start"></td>
                            <td class="border-end">ছাত্র</td>
                            <td class="border-end">ছাত্রী</td>
                            <td class="border-end">মোট</td>
                            @foreach ($secs as $item)
                                <td class="border-end">{{ $item }}</td>
                            @endforeach
                        </tr>
                        @foreach ($classes as $item)
                            <tr class="">
                                <td scope="row" class="border-end border-start">{{ $item->class_name }}</td>
                                <td class="border-end">{{ $item->boys }}</td>
                                <td class="border-end">{{ $item->girls }}</td>
                                <td class="border-end">{{ $item->girls + $item->boys }}</td>
                                @php
                                    $erEnt = $array_count - $item->sections->count();
                                @endphp
                                @foreach ($item->sections as $item)
                                    <td class="border-end"> {{ $item->section_student }}</td>
                                @endforeach
                                @for ($i = 1; $i < $erEnt; $i++)
                                    <td class="border-end"></td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 my-4">
            <div class="table-responsive">
                <table class="table table-info">
                    <thead>
                        <tr class="border-top">
                            <th scope="col" colspan="2" class="border-end border-start"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td class="border-end border-start">মোট শিক্ষার্থী</td>
                            <td class="border-end">{{ $total }}</td>
                        </tr>
                        <tr class="">
                            <td class="border-end border-start">ছাত্র</td>
                            <td class="border-end">{{ $boys_count }}</td>
                        </tr>
                        <tr class="">
                            <td class="border-end border-start">ছাত্রী</td>
                            <td class="border-end">{{ $girls_count }}</td>
                        </tr>
                        @foreach ($sectionData as $sectionName => $sectionStudent)
                            <tr class="">
                                <td class="border-end border-start">{{ $sectionName }}</td>
                                <td class="border-end">{{ $sectionStudent }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
