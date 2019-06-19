<ul class="menu-items">

	@if(!auth()->user()->staff->SupervisorFlag && !auth()->user()->hasRole('HR Supervisor'))
		<li class="m-t-30 ">
			<a href="{{ route('staff.index') }}" class="detailed">
				<span class="title">Dashboard</span>
			</a>
			<span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
		</li>
		<li class="">
			<a href="{{ route('staff.appraisals') }}">
				<span class="title">Goals Setting</span>
			</a>
			<span class="icon-thumbnail">gs</span>
		</li>

	@elseif(auth()->user()->hasRole('HR Supervisor') && auth()->user()->staff->SupervisorFlag)
		<li class="m-t-30">
			<a href="{{ route('hrStaffGoals') }}" class="detailed">
				<span class="title">Staff Goals</span>
			</a>
			<span class="icon-thumbnail">sg</span>
		</li>
		<li>
			<a href="javascript:;"><span class="title">Behavioural</span>
				<span class=" arrow"></span></a>
			<span class="icon-thumbnail">Be</span>
			<ul class="sub-menu">
				<li class="">
					<a href="{{ route('hr.index') }}">Behavioural Categories</a>
					<span class="icon-thumbnail">bec</span>
				</li>
				<li class="">
					<a href="{{ route('hr.behavioural.items') }}">Behavioural Items</a>
					<span class="icon-thumbnail">bei</span>
				</li>
			</ul>
		</li>
		<li class="m-t-30">
			<a href="{{ route('levels.index') }}" class="detailed">
				<span class="title">Levels</span>
			</a>
			<span class="icon-thumbnail">Le</span>
		</li>

	@elseif(auth()->user()->hasRole('HR Supervisor')){
		<li class="m-t-30">
			<a href="javascript:;"><span class="title">Behavioural</span>
				<span class=" arrow"></span></a>
			<span class="icon-thumbnail">Be</span>
			<ul class="sub-menu">
				<li class="">
					<a href="{{ route('hr.index') }}">Behavioural Categories</a>
					<span class="icon-thumbnail">bec</span>
				</li>
				<li class="">
					<a href="{{ route('hr.behavioural.items') }}">Behavioural Items</a>
					<span class="icon-thumbnail">bei</span>
				</li>
			</ul>
		</li>
		<li class="m-t-30">
			<a href="{{ route('levels.index') }}" class="detailed">
				<span class="title">Levels</span>
			</a>
			<span class="icon-thumbnail">Le</span>
		</li>

	@elseif(auth()->user()->staff->SupervisorFlag)
		<li class="m-t-30">
			<a href="{{ route('supervisor.index') }}" class="detailed">
				<span class="title">Staff Goals</span>
			</a>
			<span class="icon-thumbnail">sg</span>
		</li>

	@endif

</ul>