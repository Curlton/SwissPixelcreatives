<div x-data="{ preventMenu(e) { e.preventDefault(); } }">
    <div class="certificate-wrapper">
        <div class="bg-slate-800 border border-slate-700 p-5 rounded-2xl cursor-pointer hover:bg-slate-750 transition-all shadow-lg" 
             wire:click="toggleView">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500">
                    <i class="ri-file-pdf-2-line text-2xl"></i>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-0">View Official Certificate</h5>
                    <p class="text-slate-400 text-xs mb-0">PDF Secure Protected View</p>
                </div>
                <div class="ml-auto">
                    <i class="ri-arrow-right-s-line text-slate-500"></i>
                </div>
            </div>
        </div>

        @if($showViewer)
        <div class="fixed inset-0 z-[9999] flex items-center justify-center p-4 backdrop-blur-xl bg-slate-950/90 anim-fade-in"
             @contextmenu="preventMenu"> <div class="relative w-full max-w-5xl h-[90vh] bg-slate-900 rounded-2xl shadow-2xl overflow-hidden flex flex-col border border-white/5">
                
                <div class="p-4 flex justify-between items-center border-b border-white/10 bg-slate-900/50">
                    <span class="text-white font-medium text-xs tracking-[0.2em] flex items-center">
                        <i class="ri-lock-password-line text-amber-500 mr-2 text-lg"></i>
                        SECURE ENCRYPTED VIEW
                    </span>
                    <button wire:click="toggleView" class="w-10 h-10 rounded-full bg-white/5 text-white hover:bg-red-500/20 hover:text-red-500 flex items-center justify-center transition-all">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>

                <div class="flex-grow bg-slate-800 relative overflow-hidden">
                    
                    <div class="absolute inset-0 pointer-events-none z-30 flex items-center justify-center opacity-[0.07] select-none">
                        <div class="text-center">
                            <h2 class="text-7xl md:text-9xl font-black rotate-[-30deg] text-white border-[10px] border-white p-10">
                                SWISS PIXEL
                            </h2>
                            <p class="text-2xl mt-4 font-bold rotate-[-30deg] text-white">OFFICIAL DOCUMENT</p>
                        </div>
                    </div>

                    <iframe 
                        src="{{ $certificateUrl }}#toolbar=0&navpanes=0&scrollbar=1" 
                        class="w-full h-full border-none relative z-10"
                        title="Certificate Viewer"
                        loading="eager">
                    </iframe>
                </div>

                <div class="p-3 bg-slate-950 border-t border-white/5 flex justify-center items-center gap-4">
                    <div class="h-1 w-1 bg-amber-500 rounded-full"></div>
                    <p class="text-[9px] text-slate-500 uppercase tracking-widest mb-0">
                        Verification ID: {{ substr(md5($certificateUrl), 0, 12) }} | Unauthorized distribution is strictly prohibited.
                    </p>
                    <div class="h-1 w-1 bg-amber-500 rounded-full"></div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>