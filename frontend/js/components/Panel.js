export default {
    template: `
      <div :class="{
      'p-4 border rounded' : true,
      'bg-white border-gray-300 text-black' : theme ==='light',
      'bg-gray-700 border-gray-600 text-white' : theme ==='dark'
      }">
        <h2 v-if="$slots.heading" class="font-bold mb-2">
          <slot name="heading"/>
        </h2>
        <slot/>

        <footer v-if="$slots.footer" class="border-gray-600 border-t mt4 pt-4 text-sm">
          <slot name="footer"></slot>
        </footer>
      </div>

    `,
    props: {
        theme: {type: String, default: 'dark'}
    }
}


/*

        <panel>

          This is my default content.
        </panel>

        <panel>
          <template v-slot:heading>
            This is my heading..
          </template>
          This is my default content.
        </panel>

        <panel>
          <template v-slot:heading>
            This is my heading..
          </template>
          This is my default content.

          <template v-slot:footer>
            Click to learn more.
          </template>
        </panel>

        <panel theme = "light">
          <template v-slot:heading>
            This is my heading..
          </template>
          This is my default content.

          <template v-slot:footer>
            Click to learn more.
          </template>
        </panel>
* */
