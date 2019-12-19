# Behaviors
module Command
    class Command
        def initialize(name)
            @recs = Array.new
            @name = name
        end
        def addRec(rec)
            @recs << rec
        end
        def doCommand
            @recs.each do |rec|
                rec.action(@name)
            end
        end
    end

    class Receiver
        def initialize(name)
            @name = name
        end
        def action(name)
            puts "#{@name} 执行了命令 #{name}"
        end
    end

    class Invoke
        @com
        def initialize(com)
            @com = com
        end
        def execute
            @com.doCommand
        end
    end

    module Test
    rec1 = Receiver.new('张三')
    rec2 = Receiver.new('李四')
    comm = Command.new('A 计划')
    comm.addRec rec1
    comm.addRec rec2

    inv = Invoke.new(comm)
    inv.execute
    end
end









