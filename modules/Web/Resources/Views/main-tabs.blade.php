<ul class="nav nav-tabs main-navbar" id="main-navigation" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="board-tab" data-bs-toggle="tab" data-bs-target="#board" type="button" role="tab" aria-controls="board" aria-selected="true">Board</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes" type="button" role="tab" aria-controls="notes" aria-selected="false">Notes</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="wiki-tab" data-bs-toggle="tab" data-bs-target="#project-wiki" type="button" role="tab" aria-controls="project-wiki" aria-selected="false">Wiki</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="team-tab" data-bs-toggle="tab" data-bs-target="#team" type="button" role="tab" aria-controls="team" aria-selected="false">Team</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="backlog-tab" data-bs-toggle="tab" data-bs-target="#backlog" type="button" role="tab" aria-controls="backlog" aria-selected="false">Backlog</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="sprints-tab" data-bs-toggle="tab" data-bs-target="#sprints" type="button" role="tab" aria-controls="sprints" aria-selected="false">Sprints</button>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="board" role="tabpanel" aria-labelledby="board-tab">
        @include('web::tabs.kanban.kanban')
        @include('web::tabs.notes.notes')
        @include('web::tabs.wiki.wiki')
        @include('web::tabs.team.team')
        @include('web::tabs.backlog.backlog')
        @include('web::tabs.sprints.sprints')
    </div>
</div>
