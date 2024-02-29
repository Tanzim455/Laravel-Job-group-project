<div>
    @include('livewire.companynav')
    {{Auth::guard('company')->user()->name }}
</div>
