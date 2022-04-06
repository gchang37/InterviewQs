Q1.py implementation is inspired by Most Least Recently Used Cache implementation
The container used to hold all the book records is a Min heap queue where the access count of each book is used to determine which book record is to be replaced when the heap reached the designated size.
For implementation and developing purpose the SIZE OF HEAP is set to 3 