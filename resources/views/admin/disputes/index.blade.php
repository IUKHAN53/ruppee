@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Disputes</h4>
                    <p class="card-description">
                        Disputes by users
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Service Name
                                </th>
                                <th>
                                    Order ID
                                </th>
                                <th>
                                    Disputed by
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Decision For
                                </th>
                                <th>
                                    Decision Against
                                </th>
                                <th>
                                    Dispute Date
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($disputes as $dispute)
                                <tr>
                                    <td class="py-1">
                                        {{$dispute->buyer_proposal->service->title ?? ''}}
                                    </td>
                                    <td>
                                        {{$dispute->buyer_proposal->id}}
                                    </td>
                                    <td>
                                        {{$dispute->user->name}}
                                    </td>
                                    <td>
                                        {{$dispute->status}}
                                    </td>
                                    <td>
                                        {{$dispute->decision_for->name ?? 'N/A'}}
                                    </td>
                                    <td>
                                        {{$dispute->decision_against->name ?? 'N/A'}}
                                    </td>
                                    <td>
                                        {{$dispute->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" id="resolve">
                                            <option selected>Resolve</option>
                                            <option value="{{$dispute->id}}---{{$dispute->buyer_proposal->service->user->id ?? ''}}">In Favor
                                                of {{$dispute->buyer_proposal->service->user->name ?? ''}}</option>
                                            <option value="{{$dispute->id}}---{{$dispute->buyer_proposal->user->id ?? ''}}">In Favor
                                                of {{$dispute->buyer_proposal->user->name ?? ''}}</option>
                                            <option value="{{$dispute->id}}---3">Reject</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        let res = $('#resolve');
        res.change(()=>{
            if (confirm('Do you want to resolve this dispute?')) {
                let value = res.val().split('---');
                let url = '{{route('admin-dispute-resolve',['dispute'=>'id_of_dispute','resolution'=>'resolution_as'])}}';
                url = url.replace('id_of_dispute',value[0])
                url = url.replace('resolution_as',value[1])
                url = url.replace('amp;','')
                window.location = url;
            }
        })
    </script>
@endpush
