@props(['data' => []])

<div>

  <div x-data="drugSelector()">
    <x-inputs.select name="therapeutic-class" placeholder="Kelas Terapi" label="Kelas Terapi" x-model="selectedClassId"
      @change="updateSub1Options()">
      <option value="">Select Kelas Terapi</option>
      <template x-for="therapeuticClass in data" :key="therapeuticClass.id">
        <option :value="therapeuticClass.id" x-text="therapeuticClass.name"></option>
      </template>
    </x-inputs.select>

    <div class="grid grid-cols-3 gap-3">

      <!-- Sub1 Selector -->
      <div x-show="sub1Options.length > 0">
        <x-inputs.select name="sub1" label="Sub Kelas Terapi 1" placeholder="Select Sub Kelas Terapi 1" x-model="selectedSub1Id"
          @change="updateSub2Options()">
          <option value="">Pilih</option>
          <template x-for="sub1 in sub1Options" :key="sub1.id">
            <option :value="sub1.id" x-text="sub1.name"></option>
          </template>
        </x-inputs.select>
      </div>

      <!-- Sub2 Selector -->
      <div x-show="sub2Options.length > 0">
        <x-inputs.select name="sub2" label="Sub Kelas Terapi 2" placeholder="Select Sub Kelas Terapi 2" x-model="selectedSub2Id"
          @change="updateSub3Options()">
          <option value="">Pilih</option>
          <template x-for="sub2 in sub2Options" :key="sub2.id">
            <option :value="sub2.id" x-text="sub2.name"></option>
          </template>
        </x-inputs.select>
      </div>

      <!-- Sub3 Selector -->
      <div x-show="sub3Options.length > 0">
        <x-inputs.select name="sub3" label="Sub Kelas Terapi 3" placeholder="Select Sub Kelas Terapi 3" x-model="selectedSub3Id"
          @change="updateDrugName()">
          <option value="">Pilih</option>
          <template x-for="sub3 in sub3Options" :key="sub3.id">
            <option :value="sub3.id" x-text="sub3.name"></option>
          </template>
        </x-inputs.select>
      </div>

    </div>

    <x-inputs.text name="recipe" label="Resep" placeholder="Resep" x-model="selectedDrug" readonly />

  </div>

  <script>
    function drugSelector() {
      return {
        data: @json($data),

        selectedClassId: {{ old('therapeutic-class') ? 'parseInt(' . old('therapeutic-class') . ')' : 'null' }},
        selectedSub1Id: {{ old('sub1') ? 'parseInt(' . old('sub1') . ')' : 'null' }},
        selectedSub2Id: {{ old('sub2') ? 'parseInt(' . old('sub2') . ')' : 'null' }},
        selectedSub3Id: {{ old('sub3') ? 'parseInt(' . old('sub3') . ')' : 'null' }},
        selectedDrug: "{{ old('recipe', '') }}",

        sub1Options: [],
        sub2Options: [],
        sub3Options: [],

        init() {
          console.log('Initializing with:', {
            selectedClassId: this.selectedClassId,
            selectedSub1Id: this.selectedSub1Id,
            selectedSub2Id: this.selectedSub2Id,
            selectedSub3Id: this.selectedSub3Id,
          });

          if (this.selectedClassId) {
            this.updateSub1Options();
          }
          if (this.selectedSub1Id) {
            this.updateSub2Options();
          }
          if (this.selectedSub2Id) {
            this.updateSub3Options();
          }
          if (this.selectedSub3Id) {
            this.updateDrugName();
          }
        },

        updateSub1Options() {
          console.log('Updating Sub1 options...');
          this.sub1Options = [];
          this.sub2Options = [];
          this.sub3Options = [];
          this.selectedSub1Id = null;
          this.selectedSub2Id = null;
          this.selectedSub3Id = null;
          this.selectedDrug = '';

          const selectedClass = this.data.find(d => d.id == this.selectedClassId);
          if (selectedClass) {
            this.sub1Options = selectedClass.sub1 || [];
            console.log('Sub1 options:', this.sub1Options);

            if (this.selectedSub1Id) {
              this.selectedSub1Id = parseInt(this.selectedSub1Id);
              this.updateSub2Options();
            }
          }

          // Check for drug in selectedClass
          this.updateDrugName();
        },

        updateSub2Options() {
          console.log('Updating Sub2 options...');
          this.sub2Options = [];
          this.sub3Options = [];
          this.selectedSub2Id = null;
          this.selectedSub3Id = null;
          this.selectedDrug = '';

          const selectedSub1 = this.sub1Options.find(s => s.id == this.selectedSub1Id);
          if (selectedSub1) {
            this.sub2Options = selectedSub1.sub2 || [];
            console.log('Sub2 options:', this.sub2Options);

            if (this.selectedSub2Id) {
              this.selectedSub2Id = parseInt(this.selectedSub2Id);
              this.updateSub3Options();
            }
          }

          // Check for drug in selectedSub1
          this.updateDrugName();
        },

        updateSub3Options() {
          console.log('Updating Sub3 options...');
          this.sub3Options = [];
          this.selectedSub3Id = null;
          this.selectedDrug = '';

          const selectedSub2 = this.sub2Options.find(s => s.id == this.selectedSub2Id);
          if (selectedSub2) {
            this.sub3Options = selectedSub2.sub3 || [];
            console.log('Sub3 options:', this.sub3Options);

            if (this.selectedSub3Id) {
              this.selectedSub3Id = parseInt(this.selectedSub3Id);
              this.updateDrugName();
            }
          }

          // Check for drug in selectedSub2
          this.updateDrugName();
        },

        updateDrugName() {
          console.log('Updating drug name...');
          this.selectedDrug = '';

          // Check if selectedDrug can be set from the current sub3
          const selectedSub3 = this.sub3Options.find(s => s.id == this.selectedSub3Id);
          if (selectedSub3 && selectedSub3.drug) {
            this.selectedDrug = selectedSub3.drug.name;
          }

          // If not found, check the parent levels
          if (!this.selectedDrug) {
            const selectedSub2 = this.sub2Options.find(s => s.id == this.selectedSub2Id);
            if (selectedSub2 && selectedSub2.drug) {
              this.selectedDrug = selectedSub2.drug.name;
            }
          }

          if (!this.selectedDrug) {
            const selectedSub1 = this.sub1Options.find(s => s.id == this.selectedSub1Id);
            if (selectedSub1 && selectedSub1.drug) {
              this.selectedDrug = selectedSub1.drug.name;
            }
          }

          if (!this.selectedDrug) {
            const selectedClass = this.data.find(d => d.id == this.selectedClassId);
            if (selectedClass && selectedClass.drug) {
              this.selectedDrug = selectedClass.drug.name;
            }
          }
        }
      }
    }
  </script>

</div>
