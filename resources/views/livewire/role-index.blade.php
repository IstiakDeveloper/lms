<div>
    <table class="w-full table-auto">
         <tr>
             <th class="border px-4 py-2 text-left">Name</th>
             <th class="border px-4 py-2 text-left">Permission</th>
             <th class="border px-4 py-2">Action</th>
         </tr>

         @foreach ($roles as $role)
             <tr>
                 <td class="border px-4 py-2">{{$role->name}}</td>

                 <td class="border px-4 py-2">
                    @foreach ($role->permissions as $permission )
                    <span class="mr-4 bg-blue-400 rounded text-white px-2">{{$permission->name}}</span>
                    @endforeach
                 </td>


                 <td class="border px-4 py-2 text-center">
                     <div class="flex item-center justify-center mr-2">
                         <a href="{{route('role.edit', $role->id)}}">
                             @include('components.icons.edit')
                         </a>


                         <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="RoleDelete({{$role->id}})">
                             <button class="ml-2" type="submit">
                                 @include('components.icons.trash')
                             </button>
                         </form>

                     </div>
                 </td>
             </tr>
         @endforeach
    </table>
 </div>
