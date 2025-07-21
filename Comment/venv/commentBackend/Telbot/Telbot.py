import telebot
import threading
from telebot import types
from telegram.ext import ApplicationBuilder, CommandHandler, ContextTypes
from telegram import Update

#BOT_TOKEN = os.environ.get('BOT_TOKEN')
BOT_TOKEN = "8168266978:AAH_QMWVTVH0RJdZIWiSnXUjkymQv9EfH9o"
bot = telebot.TeleBot(BOT_TOKEN)

user_data={}

@bot.message_handler(commands=['start','hello'])
def send_welcome(message):
    bot.reply_to(message,"Hello from Prasida Invitation")

@bot.message_handler(commands=['link'])
def get_link(message):
    if message.text == "/cancel":
        cancel_handler(message)
        #return
    markup = types.ReplyKeyboardMarkup(resize_keyboard=True, one_time_keyboard=True)
    markup.row("Bapak","Ibu","Saudara","Saudari")
    bot.send_message(message.chat.id,"Pilih panggilan untuk tamu undangan",reply_markup=markup)
    bot.register_next_step_handler(message,ask_name)

def ask_name(message):
    remove_keyboard = types.ReplyKeyboardRemove()
    chat_id = message.chat.id
    if message.text == "/cancel":
        cancel_handler(message)
        #return
    user_data[chat_id] = {"title":message.text}
    bot.send_message(chat_id,"Masukan nama untuk penerima undangan:",reply_markup=remove_keyboard)
    bot.register_next_step_handler(message,create_link)

def create_link(message):
    chat_id = message.chat.id
    name = message.text
    title = user_data.get(chat_id,{}).get("title","")

    bot.send_message(chat_id,f"berikut link undangan: \n http://192.168.1.41:5500?p={title}&g={name}")

@bot.message_handler(commands=['cancel'])
def cancel_handler(message):
    remove_keyboard = types.ReplyKeyboardRemove()
    chat_id = message.chat.id
    if chat_id in user_data:
        user_data.pop(chat_id)
        bot.send_message(chat_id,"Proses dibatalkan",reply_markup=remove_keyboard)
    else:
        bot.send_message(chat_id,"Tidak ada proses berlangsung")

@bot.message_handler(func=lambda msg:True)
def echo_all(message):
    bot.reply_to(message, message.text)

def run_bot():
    print("Bot polling started")
    bot.infinity_polling()