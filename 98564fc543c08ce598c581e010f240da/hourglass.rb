
#This program is to be run in the terminal. Simply go into the folder with the MD5 hash number and from the terminal
# type in ruby hourglass.rb to run the program. 

def create_art(level)
  top = '_' * (level * 2 + 1)
  puts top
  print_top(level)
  print_bottom(level)
end

def print_top(level)
  array = []
  (1..level).each do |n|
      line = (' ' * (level - n)) + '\\' + (' ' * (((n - 1) * 2) + 1)) + '/'
    array << line
  end
  array.reverse.each do |line|
    puts line
  end
end

def print_bottom(level)
  array = []
  (1..level).each do |n|
    if n == level
      line = (' ' * (level - n)) + '/' + ('_' * (((n - 1) * 2) + 1)) + '\\'
    else
      line = (' ' * (level - n)) + '/' + (' ' * (((n - 1) * 2) + 1)) + '\\'
    end
    array << line
  end
  array.each do |line|
    puts line
  end
end

puts "How tall would you like your hourglass to be?"
response = gets.chomp

create_art(response.to_i)



