<x-dashboard-layout>
<section class="flex flex-col">
    <h2 class="font-bold text-2xl text-gray-800">Maids</h2>
    <h3 class="font-semibold text-l text-gray-600">Collection software-defined access that used to reach Providence.</h3>
    <section class="flex flex-row-reverse w-full my-4">
        <a href="/dashboard/maids/new" class="decoration-none">
            <button class="px-3 py-2 bg-black text-white rounded font-semibold">New Maid</button>
        </a>
    </section>
    <table class="text-center my-2">
        <tr class="text-gray-800">
            <th>Name</th>
            <th>Abilities</th>
            <th>Commands</th>
            <th>Signature</th>
        </tr>
        @forelse ($maids as $maid)
        <tr class="text-center text-gray-600">
            <td> {!! $maid->name !!} </td>
            <td> 
                <ul class="mx-2">
                    @foreach (json_decode($maid->abilities,true) as $ability)
                        <li class="mx-2 my-2 bg-gray-700 text-white rounded">{!! $ability !!} </li>
                    @endforeach
                </ul>
            </td>            
            <td> 
                <ul class="list-decimal mx-2">
                @foreach (json_decode($maid->commands,true) as $order=>$abilities)
                    <li>
                        <p class="mx-2 my-2 bg-gray-700 text-white rounded">{!! $order !!}</p>
                        <ul class="list-none pl-6">
                            @foreach ($abilities as $ability)
                                <li class="mx-2 my-2 text-gray-700 rounded border border-gray-700">{!! $ability !!}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                </ul>
            </td>
            <td>
                <textarea cols="15" rows="5" class="my-2 bg-gray-100 rounded border-none focus:ring focus:ring-gray-300">{!! $maid->signature!!}</textarea>
            </td>
        </tr>
        @empty
        <tr class="text-center text-gray-600">
           <td colspan="5">
            <section>
                <p class="mx-auto my-4 font-bold text-2xl text-gray-700">¯\_(ツ)_/¯</p>
                <p class="mx-auto my-4 font-bold text-m text-gray-700">No Maids, click New Maid button at top right corner of this table.</p>
            </section>
           </td>
        </tr>
        @endforelse
    </table>
</section>
</x-dashboard-layout>