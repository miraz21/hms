<div class="row">
    <div class="mb-3 col-2">
        <label>
            <select class="form-select medicine select2" name="medicine[]" >
                <option value="" selected>Select Medicine</option>
                @foreach($medicinedetails as $item)
                    <option value="{{$item->id}}">{{$item->medicinename->name}}</option>
                @endforeach
            </select>
        </label>
    </div>
    <div class="mb-3 col-2 input-group">
        <label for="price" class="input-group-prepend">
            <span class="input-group-text">Price</span>
        </label>
        <input onchange="totalAmnt(1)" type="number" name="price[]" class="form-control"  step="0.01">
    </div>
    <div class="mb-3 col-2 input-group">
        <label for="quantity" class="input-group-prepend">
            <span class="input-group-text">Quantity</span>
        </label>
        <input onchange="totalAmnt(1)" type="number" name="quantity[]" class="form-control">
    </div>
    <div class="mb-3 col-2 input-group">
        <label for="amount" class="input-group-prepend">
            <span class="input-group-text">Amount</span>
        </label>
        <input  type="number" name="amount[]" class="form-control" >
    </div>
</div>
