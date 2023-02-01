<form>
    <div class="row gx-4">
        <div class="col-auto text-center">
            <div class="text-center">
                <h4 class="">แจ้งซ่อมอุปกรณ์</h4>
            </div>

        </div>
    </div>
    @csrf
    <div class="row gx-4">
        <div class="col-md-12 pt-2">
            <x-native-select label="เลือกอุปกรณ์ที่แจ้งซ่อม" wire:model="helpdesks.ItemID">
                <option value="">เลือกอุปกรณ์ที่แจ้งซ่อม</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->ItemName }}</option>
                @endforeach
                <option value="0">อื่นๆ</option>
            </x-native-select>
        </div>

        @if (@$helpdesks['ItemID'] == '0')
            {{-- {{ $listItems }} --}}
            <div class="col-md-12 pt-2">
                <x-input wire:model="helpdesks.OtherName" label="**กรณีอื่นๆ ระบุชื่ออุปกรณ์/ปัญหา"
                    placeholder="ระบุชื่ออุปกรณ์/ปัญหา" />
            </div>
        @endif

    </div>
    <div class="row">
        <div class="col-md-12 pt-2">
            <x-input wire:model="helpdesks.Place" label="สถานที่ในการดำเนินงาน"
                placeholder="ระบุสถานที่ในการดำเนินงาน" />
        </div>
        <div class="col-md-12 pt-2">
            <x-textarea wire:model="helpdesks.Details" label="รายละเอียด" placeholder="กรุณาระบุรายละเอียด" />
        </div>
    </div>
    <div class="row pt-2">
        <x-button info label="แจ้งซ่อม" wire:click="onClickAddJob()"></x-button>

    </div>
</form>
