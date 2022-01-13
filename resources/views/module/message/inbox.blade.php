@extends('layouts.master')
@section('title','Message List')
@section('parentPageTitle', 'All Ticket')
@section('content')
    <div class="card m-2">
        <div class="card-header">
            <div class="{{(App::isLocale('ar') ? 'float-right' : 'float-left')}}">
                <h2 class="card-title">@translate(Student Message List)</h2>
            </div>
            <div class="float-right">
                <div class="row">
                </div>
            </div>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">@translate(S/L)</th>
                    <th style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">@translate(Student)</th>
                    <th style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">@translate(Last Message)</th>
                    <th style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">@translate(Date)</th>
                    <th style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">@translate(Action)</th>
                </tr>
                </thead>
                <tbody>
                @forelse($enroll as  $item)
                    @if($item->messagesForInbox == !null)
                    <tr>
                        <td style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">{{ ($loop->index+1) + ($enroll->currentPage() - 1)*$enroll->perPage() }}</td>
                        <td style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">
                          @translate(Student): <a target="_blank" href="{{route('students.show',$item->user_id)}}">{{studentDetails($item->user_id)->name ?? 'N/A'}}</a>
                            <br />
                           @translate(Course): <a target="_blank" href="{{ route('course.show',[$item->course_id,$item->enrollCourse->slug]) }}">{{$item->enrollCourse->title ?? 'N/A'}}</a>
                        </td style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">
                        <td style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">
                            <a target="_blank" href="{{ route('messages.show', $item->id) }}">
                                {{$item->messagesForInbox->content}}
                                <span class="badge badge-dark">
                                  {{ $item->messagesForInbox->user_id == \Illuminate\Support\Facades\Auth::id() ? '@translate(Send)' : '@translate(Reply)'}}
                              </span>
                            </a>

                        </td>
                        <td style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">
                            {{date('d-M-y',strtotime($item->created_at))}}
                        </td>
                        <td style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}">
                            <div class="kanban-menu">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16" type="button"
                                            id="KanbanBoardButton1" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right action-btn"
                                         aria-labelledby="KanbanBoardButton1" x-placement="bottom-end">
                                        <a class="dropdown-item" href="{{ route('comments.delete', $item->id) }}">
                                            <i class="feather icon-delete mr-2"></i>@translate(Delete Message)</a>
                                        <a class="dropdown-item" href="{{ route('messages.show', $item->id) }}">
                                            <i class="feather icon-edit-2 mr-2"></i>@translate(Messages)</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                @empty
                    <tr style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}"></tr>
                    <tr>
                        <td style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}"><h3 class="text-center">@translate(No Data Found)</h3></td>
                    </tr>
                    <tr style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}"></tr>
                    <tr style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}"></tr>
                    <tr style="{{(App::isLocale('ar') ? 'text-align:right' : ' ')}}"></tr>
                @endforelse
                </tbody>
                <div class="{{(App::isLocale('ar') ? 'float:right' : 'float:left')}}">
                    {{ $enroll->links() }}
                </div>
            </table>
        </div>
    </div>

@endsection
