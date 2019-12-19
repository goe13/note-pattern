module Decorator
    class Decorater
        def initialize(cls)
            @cls = cls
        end
        def do1
            puts 'decorator d1 start'
            @cls.do1
            puts 'decorator d1 end'
        end
    end
    class ClassA
        def do1
            puts 'ClassA is doing'
        end
    end

    module Test
        c1 = Decorater.new(ClassA.new)
        c1.do1
    end
end