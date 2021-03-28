<template>
  <ul class="chat">
    <li class="left clearfix" v-for="message in messages">
      <div class="chat-body clearfix text-right" v-if="message.fromMe">
        <p>
          {{ message.body }}
        </p>
      </div>

      <div class="chat-body clearfix pull-right" v-else-if="!message.fromMe">
        <div class="header">
          <strong class="primary-font">
            {{ message.senderName }}
          </strong>
        </div>
        <p>
          {{ message.body }}
        </p>
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  props: ['messages']
};
</script>