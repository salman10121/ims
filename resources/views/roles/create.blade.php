@extends('layout.app')

@section('content')
    <div class="container">
        <h2>{{ __('Create Role') }}</h2>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <!-- Role Name Selection -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Role Name') }}</label>
                <select name="name" id="name" class="form-control" required>
                    <option value="">{{ __('Select Role') }}</option>
                    <option value="Super Admin">{{ __('Super Admin') }}</option>
                    <option value="Admin">{{ __('Admin') }}</option>
                    <option value="User">{{ __('User') }}</option>
                </select>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Permissions</h2>
                <div class="form-check">
                    <input type="checkbox" name="select-all" id="select-all" class="form-check-input">
                    <label for="select-all" class="form-check-label">Select All</label>
                </div>
            </div>


            <div class="">
                <div class="">
                    <div class="table-responsive shadow-none">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="200px">{{ __('Module') }}</th>
                                    <th class="text-center">{{ __('Permissions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $modulePermissions = [
                                    'Role' => ['Manage', 'Create', 'Edit', 'Delete'],
                                    'Staff' => ['Manage', 'Create', 'Edit', 'Delete'],
                                    'Product' => ['Manage', 'Create', 'Edit', 'Delete'],
                                    'Category' => ['Manage', 'Create', 'Edit', 'Delete'],
                                    'Brand' => ['Manage', 'Create', 'Edit', 'Delete'],
                                    'Units' => ['Manage', 'Create', 'Edit', 'Delete'],
                                    'Supplier' => ['Manage', 'Create', 'Edit', 'Delete'],
                                    'Customer' => ['Manage', 'Create', 'Edit', 'Delete'],

                                    // Add more modules as needed...
                                ];
                                ?>
                                @php use Illuminate\Support\Str; @endphp
                                @foreach ($modulePermissions as $module => $actions)
                                    <tr>
                                        <td class="form-control-label">
                                            {{ __($module) }}
                                            <input type="checkbox" class="form-check-input me-1 check-all-btn"
                                                data-module="{{ Str::slug($module) }}"
                                                id="select-all-{{ Str::slug($module) }}">
                                        </td>

                                        <td>
                                            <div class="row" id="module-{{ Str::slug($module) }}">
                                                @foreach ($actions as $action)
                                                    @php
                                                        $permLabel = $action . ' ' . $module;
                                                        $permKey = array_search($permLabel, $permissions);
                                                    @endphp

                                                    @if ($permKey !== false)
                                                        <div class="col-3 custom-control form-check">
                                                            <input type="checkbox" name="permissions[]"
                                                                value="{{ $permKey }}"
                                                                class="form-check-input permission-box module-{{ Str::slug($module) }}"
                                                                id="permission_{{ $permKey }}">
                                                            <label for="permission_{{ $permKey }}"
                                                                class="form-check-label">
                                                                {{ $action }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
        </form>
    </div>
@endsection

<script>
    $(document).ready(function() {
        // Select all checkboxes when "Select All" checkbox is clicked
        $('#select-all').on('click', function() {
            var isChecked = $(this).prop('checked');
            $('.permission-box').prop('checked', isChecked);
            $('.check-all-btn').prop('checked', isChecked);
        });

        // Select all permissions for a module when module's "Select All" checkbox is clicked
        $('.check-all-btn').on('click', function() {
            var module = $(this).data('module');
            var isChecked = $(this).prop('checked');
            $('.module-' + module).prop('checked', isChecked);

            // Uncheck "Select All" checkbox if any permission is unchecked
            if (!isChecked) {
                $('#select-all').prop('checked', false);
            } else {
                var allChecked = true;
                $('.permission-box').each(function() {
                    if (!$(this).prop('checked')) {
                        allChecked = false;
                        return false;
                    }
                });
                $('#select-all').prop('checked', allChecked);
            }
        });

        // Uncheck "Select All" and module's "Select All" checkboxes if any permission is unchecked
        $('.permission-box').on('click', function() {
            var module = $(this).attr('class').match(/module-([a-zA-Z0-9_-]+)/)[1];
            var allModuleChecked = true;
            $('.module-' + module).each(function() {
                if (!$(this).prop('checked')) {
                    allModuleChecked = false;
                    return false;
                }
            });
            $('#select-all-' + module).prop('checked', allModuleChecked);

            var allChecked = true;
            $('.permission-box').each(function() {
                if (!$(this).prop('checked')) {
                    allChecked = false;
                    return false;
                }
            });
            $('#select-all').prop('checked', allChecked);
        });
    });
</script>
