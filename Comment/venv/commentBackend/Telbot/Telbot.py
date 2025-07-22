import telebot
import threading
from telebot import types
from telegram.ext import ApplicationBuilder, CommandHandler, ContextTypes
from telegram import Update
from django.contrib.staticfiles import finders
# import json

BOT_TOKEN = ""
bot = telebot.TeleBot(BOT_TOKEN)

user_data={}
user_state={}

@bot.message_handler(commands=['start','hello'])
def send_welcome(message):
    bot.reply_to(message,"Hello from Prasida Invitation")

@bot.message_handler(commands=['link'])
def get_link(message):
    chat_id = message.chat.id
    user_state[chat_id]="awating_title"    
    #markup = types.ReplyKeyboardMarkup(resize_keyboard=True, one_time_keyboard=True).row("Bapak","Ibu","Saudara","Saudari")
    markup = types.InlineKeyboardMarkup()
    markup.add(
        types.InlineKeyboardButton("Bapak",callback_data="title_Bapak"),
        types.InlineKeyboardButton("Ibu",callback_data="title_Ibu")
    )
    markup.add(
        types.InlineKeyboardButton("Saudara",callback_data="title_Saudara"),
        types.InlineKeyboardButton("Saudari",callback_data="title_Saudari")
    )
    bot.send_message(chat_id,"Pilih panggilan untuk tamu undangan",reply_markup=markup)
    if message.text == "/cancel":
        cancel_handler(message)
        return

@bot.callback_query_handler(func=lambda call: call.data.startswith("title_"))
def handle_title_selection(call):
    chat_id = call.message.chat.id
    title = call.data.split("_")[1]

    user_data[chat_id] = {"title":title}
    user_state[chat_id] = "awaiting_name"    

    bot.edit_message_reply_markup(chat_id=chat_id,message_id=call.message.message_id,reply_markup=None)
    bot.send_message(chat_id,"Masukan nama untuk penerima undangan:",parse_mode='Markdown')
    bot.register_next_step_handler(call.message,ask_name)
def ask_name(message):
    #remove_keyboard = types.ReplyKeyboardRemove()
    chat_id = message.chat.id
    
    if user_state.get(chat_id) != "awaiting_name":
        bot.send_message(chat_id, "Silakan mulai dengan perintah /link.")
        return
    
    user_state[chat_id]="awaiting_name"
    user_data[chat_id]['name'] = message.text

    bot.send_message(chat_id,f"Panggilan: {user_data[chat_id]['title']}\nNama: {user_data[chat_id]['name']}\nApakah penerima undangan sudah benar? (y/n)")
    
    bot.register_next_step_handler(message,create_link)

def create_link(message):
    chat_id = message.chat.id
    # if message.text == "/cancel":
    #     user_state.pop(chat_id,None)
    #     cancel_handler(message)
    #     return
    if user_state[chat_id] != "awaiting_name" or message.text=='n':
        bot.send_message(chat_id, "Silakan mulai dengan perintah /link.")
        return
    name = user_data.get(chat_id,{}).get("name","")
    title = user_data.get(chat_id,{}).get("title","")

    bot.send_message(chat_id,f"berikut link undangan: \n http://192.168.1.41:5500?p={title}&g={name}")

@bot.message_handler(commands=['cancel'])
def cancel_handler(message):
    remove_keyboard = types.ReplyKeyboardRemove()
    chat_id = message.chat.id
    user_state.pop(chat_id,None)
    user_data.pop(chat_id,None)
    bot.send_message(chat_id,"Proses dibatalkan",reply_markup=remove_keyboard)


@bot.message_handler(func=lambda msg:True)
def echo_all(message):
    bot.reply_to(message, message.text)

def run_bot():
    print("Bot polling started")
    bot.infinity_polling()
