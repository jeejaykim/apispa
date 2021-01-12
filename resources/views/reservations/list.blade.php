@foreach($schedules as $schedule)
<tr class="entry-block table-border">
    <td>{{Carbon::parse($schedule->sched_time)->format('h:i A')}}</td>
    @foreach($users as $user)
    <td>
        <div >

            {{App\Reservation::checkPR($schedule->id, $user->id)}}

        </div>
    </td>
    @endforeach
</tr>
@endforeach
