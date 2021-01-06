<x-app-layout>
    <x-slot name="slot">
        <div class="col-8">
            <h3>Recently Reported Sightings</h3>
            <small>Submit yours to help us narrow down this search</small>
            <table class="table table-striped table-dark table-borderless table-hover">
                <thead>
                <tr class="bg-info">
                    <th>Sighting Details</th>
                    <th>Posted</th>
                    <th>Comments</th>
                </tr>
                </thead>
                <tbody class="js-sightings-list" data-url="{{ 'partial-sightings-route' }}">

                @include('sightings._sightings')

                </tbody>
            </table>
        </div>
        <div class="col-4">
            <div class="js-github-organization" data-url="{{ 'app_github_organization_info' }}"></div>
        </div>
    </x-slot>
</x-app-layout>
