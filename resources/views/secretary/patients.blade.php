@extends('secretary.layout')
@section('title', 'Secretary - Patient Management')

@section('content')
<div class="max-w-7xl mx-auto space-y-8">
    <!-- Page Header -->
    <div class="flex items-end justify-between gap-4 mb-4">
        <div>
            <h2 class="text-3xl font-extrabold font-headline tracking-tight text-on-surface mb-1">Patient Management</h2>
            <p class="text-on-surface-variant font-body">Database of registered patients in the clinic.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm font-bold bg-primary-container text-on-primary-container px-3 py-1 rounded-full">{{ $patients->total() }} Active Patients</span>
        </div>
    </div>

    @if(session('success'))
    <div class="px-6 py-4 bg-tertiary-fixed text-on-tertiary-fixed rounded-xl font-medium shadow-sm">
        {{ session('success') }}
    </div>
    @endif
    @if($errors->any())
    <div class="px-6 py-4 bg-error-container text-on-error-container rounded-xl font-medium shadow-sm">
        <ul>
            @foreach($errors->all() as $err)
            <li>• {{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Dashboard Layout (Bento Grid Style) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Registration Form Section (Manual Entry) -->
        <section class="lg:col-span-4 space-y-6">
            <div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_10px_30px_-5px_rgba(0,106,97,0.05)] border border-outline-variant/10">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container shadow-inner">
                        <span class="material-symbols-outlined" data-icon="person_add">person_add</span>
                    </div>
                    <h3 class="text-xl font-bold font-headline text-on-surface">Register Patient</h3>
                </div>
                <form action="{{ route('admin.patients.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant ml-1">Full Name</label>
                        <input name="name" required class="w-full px-4 py-3 bg-surface-container-high rounded-xl border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all font-body text-sm text-on-surface" placeholder="ex: John Doe" type="text"/>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant ml-1">Email</label>
                        <input name="email" required type="email" class="w-full px-4 py-3 bg-surface-container-high rounded-xl border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all font-body text-sm text-on-surface" placeholder="john.doe@email.com"/>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant ml-1">Address</label>
                        <input name="adresse" required type="text" class="w-full px-4 py-3 bg-surface-container-high rounded-xl border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all font-body text-sm text-on-surface" placeholder="123 Main St"/>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant ml-1">Blood Group</label>
                            <select name="groupe_sanguin" required class="w-full px-4 py-3 bg-surface-container-high rounded-xl border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all font-body text-sm text-on-surface cursor-pointer">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant ml-1">Date of Birth</label>
                            <input name="date_naissance" required class="w-full px-4 py-3 bg-surface-container-high rounded-xl border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all font-body text-sm text-on-surface" type="date"/>
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant ml-1">Phone Number</label>
                        <input name="telephone" required class="w-full px-4 py-3 bg-surface-container-high rounded-xl border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all font-body text-sm text-on-surface" placeholder="+1 234 567 890" type="tel"/>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant ml-1">Password</label>
                            <input name="password" required type="password" class="w-full px-4 py-3 bg-surface-container-high rounded-xl border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all font-body text-sm text-on-surface" placeholder="••••••••"/>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant ml-1">Confirm</label>
                            <input name="password_confirmation" required type="password" class="w-full px-4 py-3 bg-surface-container-high rounded-xl border-none focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all font-body text-sm text-on-surface" placeholder="••••••••"/>
                        </div>
                    </div>
                    <div class="pt-6">
                        <button type="submit" class="w-full py-4 bg-primary text-on-primary font-bold rounded-xl shadow-lg shadow-primary/20 hover:bg-primary/90 hover:-translate-y-0.5 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-sm" data-icon="save">save</span>
                            Register Patient
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Patient List Section -->
        <section class="lg:col-span-8 space-y-6">
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_10px_30px_-5px_rgba(0,106,97,0.08)] border border-outline-variant/10">
                @if($patients->count() == 0)
                    <div class="p-16 text-center text-on-surface-variant font-medium">No patients found.</div>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-surface-container-low text-[10px] font-bold uppercase tracking-widest text-outline">
                            <tr>
                                <th class="px-8 py-4">Patient</th>
                                <th class="px-8 py-4 text-center">Blood Group</th>
                                <th class="px-8 py-4">Contact</th>
                                <th class="px-8 py-4">Registration</th>
                                <th class="px-8 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/10">
                            @foreach($patients as $patient)
                            <tr class="hover:bg-surface-container-low/50 transition-colors group">
                                <td class="px-8 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($patient->profile_photo_url)
                                            <img src="{{ $patient->profile_photo_url }}" alt="{{ $patient->name }}" class="w-10 h-10 rounded-full object-cover border-2 border-primary/10">
                                        @else
                                            <div class="w-10 h-10 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-sm uppercase">
                                                {{ substr($patient->name, 0, 2) }}
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">{{ $patient->name }}</p>
                                            <p class="text-[10px] text-on-surface-variant font-mono">ID: #{{ $patient->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-center">
                                    <span class="px-3 py-1 bg-tertiary-fixed text-on-tertiary-fixed rounded-full text-xs font-bold tracking-wider">{{ $patient->groupe_sanguin ?? 'N/A' }}</span>
                                </td>
                                <td class="px-8 py-4">
                                    <div class="flex flex-col gap-0.5">
                                        <p class="text-sm font-semibold text-on-surface">{{ $patient->telephone }}</p>
                                        <p class="text-xs text-on-surface-variant">{{ $patient->email }}</p>
                                    </div>
                                </td>
                                <td class="px-8 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-medium text-on-surface">{{ $patient->created_at->format('M d, Y') }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <form action="{{ route('admin.users.destroy', $patient) }}" method="POST" onsubmit="return confirm('Delete this patient?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-error bg-error-container/30 hover:bg-error-container hover:text-on-error-container rounded-lg transition-colors" title="Delete">
                                                <span class="material-symbols-outlined text-sm" data-icon="delete">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if($patients->hasPages())
                <div class="p-4 border-t border-outline-variant/10 flex justify-center">
                    {{ $patients->links() }}
                </div>
                @endif
                @endif
            </div>
        </section>
    </div>
</div>
@endsection
