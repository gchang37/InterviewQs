import heapq as hq 
import config

def printList(list):
    for i in range(config.SIZE_OF_N):
        print(list[i].bookname + ": " + str(list[i].accessCount))

def creatNewRecord(bkcache, isb):    
    if (config.recordCounts == config.SIZE_OF_N):
        #i = findLeastUsedRecord(bkcache)
        print("Find least used record to replace")
        hq.heapify(bkcache)
        temp = hq.nsmallest(1, bookListCache)[0]      

    else:        
        #empty = [i for i, x in enumerate(bookListCache) if x is None][0]
        bkcache[config.recordCounts] = Book(isb)
        config.recordCounts += 1
        print("Created new record")


def containsThenUpdate(bkcache, isb): 
    print("isb to find is " + isb) 
    try:  
        if (any(x.bookname == isb for x in bkcache)):
            i = next((i for i, x in enumerate(bkcache) if x.bookname == "B"), None)
            #i = [i for i, x in enumerate(bkcache) if x.bookname == isb][0]
            print("index of " + isb  + ": " + str(i)) 
            bkcache[int(i)].accessCount +=1
    except:
        print("Record does not exist")
        creatNewRecord(bkcache, isb)
    

    # first_or_default = next((i for i, x in enumerate(bkcache) if x.bookname == isb), None)
    # print(first_or_default)
    # if first_or_default is none:
    #     creatNewRecord

    
class Book:
    # constructor
    def __init__(self, bookname):
        self.bookname = bookname
        self.accessCount = 1
    
    # override the comparsion operator
    def __lt__(self, next):
        return self.accessCount < next.accessCount

print("Hello World from test.py")

bookListCache = [None ] * config.SIZE_OF_N
print(bookListCache)

# bookListCache[0] = Book("B")
# bookListCache[1] = Book("A")
containsThenUpdate(bookListCache, "B")
containsThenUpdate(bookListCache, "A")
hq.heapify(bookListCache)

occupy = filter(None, bookListCache)
print(str(occupy))

o1 = filter(not None, bookListCache)
print("Not none list: " + str(o1))

empty = [i for i, x in enumerate(bookListCache) if x is None]
print("Empty indicies: " + str(empty))

print(str(empty[0]))


first_or_default = next((i for i, x in enumerate(occupy) if x.bookname == "B"), None)
print("Result of first or default: " + str(first_or_default))

#bk = Book("A")
#containsThenUpdate(bookListCache, "A")

print(bookListCache)

# if(bookListCache[0] == None):
#     bookListCache[0] = bk

print(bookListCache[1].bookname)

#containsThenUpdate(bookListCache, "B")
containsThenUpdate(bookListCache, "C")
#bookListCache[1].accessCount += 1

#printList(bookListCache)

#if any(x.bookname == "B" for x in bookListCache):
# i = [i for i, x in enumerate(bookListCache) if x.bookname == "B"][0]
# print("index of B: " + str(i)) 
# bookListCache[int(i)].accessCount +=1


containsThenUpdate(bookListCache, "B")


# print("Largest: " + str(hq.nlargest(1, bookListCache)[0].bookname))
# print("Smallest: " + str(hq.nsmallest(1, bookListCache)[0].bookname))

containsThenUpdate(bookListCache, "B")
containsThenUpdate(bookListCache, "A")
containsThenUpdate(bookListCache, "D")

print("Largest: " + str(hq.nlargest(1, bookListCache)[0].bookname))
containsThenUpdate(bookListCache, "C")

printList(bookListCache)
print("Largest: " + str(hq.nlargest(1, bookListCache)[0].bookname))
print("Smallest: " + str(hq.nsmallest(1, bookListCache)[0].bookname))
hq.heapreplace(bookListCache, Book("E"))
printList(bookListCache)

# h=[]
# for i in range(config.SIZE_OF_N):
#     h.append(hq.heappop(bookListCache))

#containsThenUpdate(bookListCache, "D")


